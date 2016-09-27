<?php
namespace DAErp;

use Zend\Mvc\Router\Http\{Hostname, Literal, Segment};
use Zend\ServiceManager\Factory\InvokableFactory;
//echo file_exists(__DIR__ . '/key.pem');
return [
    'router' => [
        'routes' => [
            'daerp-manufacturer-manufacturers-rest' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/private/manufacturer/manufacturers[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => 'DAErp\Controller\Manufacturer\ManufacturersRest',
                    ],
                ],
            ],
            'daerp-subdomain' => array(
                'type' => Hostname::class,
                'options' => array(
                    'route' => 'erp.agenciadigitala.[:tail]',
                    'constraints' => array(
                        'tail' => '[a-zA-Z._-]*',
                    ),
                ),
                'may_terminate' => false,
                'child_routes' => array(
                    'daerp-home' => array(
                        'type' => Literal::class,
                        'options' => array(
                            'route' => '/',
                            'defaults' => array(
                                'controller' => Controller\IndexController::class,
                                'action' => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'daerp-login' => array(
                                'type' => Segment::class,
                                'options' => array(
                                    'route' => 'login[/]',
                                    'defaults' => array(
                                        'controller' => Controller\IndexController::class,
                                        'action' => 'index',
                                    ),
                                ),
                            ),
                            'daerp-products' => array(
                                'type' => Segment::class,
                                'options' => array(
                                    'route' => 'produtos[/]',
                                    'defaults' => array(
                                        'controller' => Controller\IndexController::class,
                                        'action' => 'index',
                                    ),
                                ),
                                'may_terminate' => true,
                                'child_routes' => array(
                                    'daerp-products-new' => array(
                                        'type' => Segment::class,
                                        'options' => array(
                                            'route' => 'novo[/]',
                                            'defaults' => array(
                                                'controller' => Controller\IndexController::class,
                                                'action' => 'index',
                                            ),
                                        ),
                                    ),
                                    'daerp-products-manufacturers' => array(
                                        'type' => Segment::class,
                                        'options' => array(
                                            'route' => 'fabricantes[/]',
                                            'defaults' => array(
                                                'controller' => Controller\IndexController::class,
                                                'action' => 'index',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),

        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
        ],
    ],
    'entity_rest_service' => [
        'DAErp\Service\Manufacturer\Manufacturer' => [
            'class_name' => 'DAErp\Service\Manufacturer\Manufacturer',
            'entity' => 'DAErp\Entity\Manufacturer\Manufacturer'
        ]
    ],

    'service_rest_controller' => [
        'DAErp\Controller\Manufacturer\ManufacturersRest' => [
            'class_name' => 'DAErp\Controller\Manufacturer\ManufacturersRestController',
            'service' => 'DAErp\Service\Manufacturer\Manufacturer'
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'layout/erp' => __DIR__ . '/../view/layout/layout.erp.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
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
                    'DACore\Entity\Erp\Manufacturer\ManufacturerInterface' => 'DAErp\Entity\Manufacturer\Manufacturer',
                    'DACore\Entity\Erp\Product\CategoryInterface' => 'DAErp\Entity\Product\Category',
                    'DACore\Entity\Erp\Product\CouponInterface' => 'DAErp\Entity\Product\Coupon',
                    'DACore\Entity\Erp\Product\DepartmentInterface' => 'DAErp\Entity\Product\Department',
                    'DACore\Entity\Erp\Product\FeatureInterface' => 'DAErp\Entity\Product\Feature',
                    'DACore\Entity\Erp\Product\GroupInterface' => 'DAErp\Entity\Product\Group',
                    'DACore\Entity\Erp\Product\MixProductInterface' => 'DAErp\Entity\Product\MixProduct',
                    'DACore\Entity\Erp\Product\ProductInterface' => 'DAErp\Entity\Product\Product',
                    'DACore\Entity\Erp\Product\RatingInterface' => 'DAErp\Entity\Product\Rating',
                    /*'DACore\Entity\Erp\Order\Sale\OrderInterface' => 'DAErp\Entity\Order\Sale\Order',
                    'DACore\Entity\Erp\Order\Sale\SaleInterface' => 'DAErp\Entity\Order\Sale\Sale',*/
                ],
            ],
        ],
    ],
];
