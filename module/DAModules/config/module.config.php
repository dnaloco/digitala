<?php
namespace DAModules;

use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Mvc\Router\Http\Hostname;

return [
    'router' => [
        'routes' => [
            'damodules-subdomain' => array(
                'type' => Hostname::class,
                'options' => array(
                    'route' => 'modules.agenciadigitala.[:tail]',
                    'constraints' => array(
                        'tail' => '[a-zA-Z._-]*',
                    ),
                ),
                'may_terminate' => false,
                'child_routes' => array(
                    'dablog-home' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/',
                            'defaults' => array(
                                'controller' => Controller\IndexController::class,
                                'action' => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'dablog-login' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => 'login[/]',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'damodules-modules-rest' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/private/modules[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => 'DAModules\Controller\ModuleRest',
                    ],
                ],
            ],
        ],
    ],
     'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
        ],
    ],
    'entity_rest_service' => [
        'DAModules\Service\Module' => [
            'class_name' => 'DAModules\Service\Module',
            'entity' => 'DAModules\Entity\Module'
        ]
    ],

    'service_rest_controller' => [
        'DAModules\Controller\ModuleRest' => [
            'class_name' => 'DAModules\Controller\ModuleRestController',
            'service' => 'DAModules\Service\Module'
        ],
    ],

    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity'),
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver',
                ],
            ],
        ],
        'entity_resolver' => [
            'orm_default' => [
                'resolvers' => [
                    'DACore\IEntities\Modules\ModuleInterface' => 'DAModules\Entity\Module',
                ],
            ],
        ],
    ],
    'data-fixture' => array(

        __NAMESPACE__ . '_fixture' => __DIR__ . '/../src/' . __NAMESPACE__ . '/Fixture',

    ),


    'view_manager' => [
        'template_map' => [
            'layout/modules' => __DIR__ . '/../view/layout/layout.modules.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy'
        ],
    ],
];
