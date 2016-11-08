<?php
namespace DAFamilyBudget;

use Zend\Mvc\Router\Http\Hostname;
use Zend\Mvc\Router\Http\Literal;
use Zend\Mvc\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router'                  => [
        'routes' => [

            // ::: DA Family Budget Rest Routes
            'dafb-billings-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/fb-billings[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAFamilyBudget\Controller\BillingsRest',
                    ],
                ],
            ],
            'dafb-categories-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/fb-categories[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAFamilyBudget\Controller\CategoriesRest',
                    ],
                ],
            ],
            // ::: END OF REST API ROUTES :::

            // ::: Subdomain && Rendered Http Routes
            'dafb-subdomain' => array(
                'type'          => Hostname::class,
                'options'       => array(
                    'route'       => 'budget.agenciadigitala.[:tail]',
                    'constraints' => array(
                        'tail' => '[a-zA-Z._-]*',
                    ),
                ),
                'may_terminate' => false,
                'child_routes'  => array(
                    'daerp-home' => array(
                        'type'          => Literal::class,
                        'options'       => array(
                            'route'    => '/',
                            'defaults' => array(
                                'controller' => Controller\IndexController::class,
                                'action'     => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes'  => array(
                            'daerp-login' => array(
                                'type'    => Segment::class,
                                'options' => array(
                                    'route'    => 'login[/]',
                                    'defaults' => array(
                                        'controller' => Controller\IndexController::class,
                                        'action'     => 'index',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),

        ],
    ],

    'controllers'             => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
        ],
    ],

    'entity_rest_service'     => [
        'DAFamilyBudget\Service\Billing' => [
            'class_name' => 'DAFamilyBudget\Service\Billing',
            'entity'     => 'DAFamilyBudget\Entity\Billing',
        ],
        'DAFamilyBudget\Service\Category' => [
            'class_name' => 'DAFamilyBudget\Service\Category',
            'entity'     => 'DAFamilyBudget\Entity\Category',
        ],
    ],

    'service_rest_controller' => [
        'DAFamilyBudget\Controller\BillingsRest' => [
            'class_name' => 'DAFamilyBudget\Controller\BillingsRestController',
            'service'    => 'DAFamilyBudget\Service\Billing',
        ],
        'DAFamilyBudget\Controller\CategoriesRest' => [
            'class_name' => 'DAFamilyBudget\Controller\CategoriesRestController',
            'service'    => 'DAFamilyBudget\Service\Category',
        ],
    ],

    'view_manager'            => [
        'template_map'        => [
            'layout/family-budget' => __DIR__ . '/../view/layout/layout.family-budget.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'doctrine'                => [
        'driver'          => [
            __NAMESPACE__ . '_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity'),
            ],
            'orm_default'             => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver',
                ],
            ],
        ],
        'configuration'   => [
            'orm_default' => [
                'types' => [
                    'enum_billingtype'  => 'DAFamilyBudget\Enum\BillingType',
                ],
            ],
        ],
        'entity_resolver' => [
            'orm_default' => [
                'resolvers' => [
                    'DACore\IEntities\FamilyBudget\BillingInterface' => 'DAFamilyBudget\Entity\Billing',
                    'DACore\IEntities\FamilyBudget\CategoryInterface' => 'DAFamilyBudget\Entity\Category',
                ],
            ],
        ],
    ],
];
