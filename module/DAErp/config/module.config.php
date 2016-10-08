<?php
namespace DAErp;

use Zend\Mvc\Router\Http\Hostname;
use Zend\Mvc\Router\Http\Literal;
use Zend\Mvc\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router'                  => [
        'routes' => [
            'daerp-manufacturer-manufacturers-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/manufacturer/manufacturers[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Manufacturer\ManufacturersRest',
                    ],
                ],
            ],
            'daerp-product-products-rest'           => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/product/products[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Product\ProductsRest',
                    ],
                ],
            ],
            'daerp-product-categories-rest'         => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/product/categories[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Product\CategoriesRest',
                    ],
                ],
            ],
            'daerp-product-departments-rest'        => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/product/departments[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Product\DepartmentsRest',
                    ],
                ],
            ],
            'daerp-product-groups-rest'             => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/product/groups[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Product\GroupsRest',
                    ],
                ],
            ],
            'daerp-product-features-rest'           => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/product/features[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Product\FeaturesRest',
                    ],
                ],
            ],
            'daerp-product-coupons-rest'            => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/product/coupons[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Product\CouponsRest',
                    ],
                ],
            ],
            'daerp-product-ratings-rest'            => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/product/ratings[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Product\RatingsRest',
                    ],
                ],
            ],
            'daerp-product-mix-products-rest'       => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/product/mix-products[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Product\MixProductsRest',
                    ],
                ],
            ],
            'daerp-product-suppliers-rest'          => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/supplier/suppliers[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Supplier\SuppliersRest',
                    ],
                ],
            ],
            'daerp-subdomain'                       => array(
                'type'          => Hostname::class,
                'options'       => array(
                    'route'       => 'erp.agenciadigitala.[:tail]',
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
                            'daerp-login'    => array(
                                'type'    => Segment::class,
                                'options' => array(
                                    'route'    => 'login[/]',
                                    'defaults' => array(
                                        'controller' => Controller\IndexController::class,
                                        'action'     => 'index',
                                    ),
                                ),
                            ),
                            'daerp-products' => array(
                                'type'          => Segment::class,
                                'options'       => array(
                                    'route'    => 'produtos[/]',
                                    'defaults' => array(
                                        'controller' => Controller\IndexController::class,
                                        'action'     => 'index',
                                    ),
                                ),
                                'may_terminate' => true,
                                'child_routes'  => array(
                                    'daerp-products-new'           => array(
                                        'type'    => Segment::class,
                                        'options' => array(
                                            'route'    => 'novo[/]',
                                            'defaults' => array(
                                                'controller' => Controller\IndexController::class,
                                                'action'     => 'index',
                                            ),
                                        ),
                                    ),
                                    'daerp-products-manufacturers' => array(
                                        'type'    => Segment::class,
                                        'options' => array(
                                            'route'    => 'fabricantes[/]',
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
        'DAErp\Service\Manufacturer\Manufacturer' => [
            'class_name' => 'DAErp\Service\Manufacturer\Manufacturer',
            'entity'     => 'DAErp\Entity\Manufacturer\Manufacturer',
        ],
        'DAErp\Service\Product\Category'          => [
            'class_name' => 'DAErp\Service\Product\Category',
            'entity'     => 'DAErp\Entity\Product\Category',
        ],
        'DAErp\Service\Product\Department'        => [
            'class_name' => 'DAErp\Service\Product\Department',
            'entity'     => 'DAErp\Entity\Product\Department',
        ],
        'DAErp\Service\Product\Group'             => [
            'class_name' => 'DAErp\Service\Product\Group',
            'entity'     => 'DAErp\Entity\Product\Group',
        ],
        'DAErp\Service\Product\Feature'           => [
            'class_name' => 'DAErp\Service\Product\Feature',
            'entity'     => 'DAErp\Entity\Product\Feature',
        ],
        'DAErp\Service\Product\Rating'            => [
            'class_name' => 'DAErp\Service\Product\Rating',
            'entity'     => 'DAErp\Entity\Product\Rating',
        ],
        'DAErp\Service\Product\MixProduct'        => [
            'class_name' => 'DAErp\Service\Product\MixProduct',
            'entity'     => 'DAErp\Entity\Product\MixProduct',
        ],
        'DAErp\Service\Product\Product'           => [
            'class_name' => 'DAErp\Service\Product\Product',
            'entity'     => 'DAErp\Entity\Product\Product',
        ],
        'DAErp\Service\Supplier\Supplier'         => [
            'class_name' => 'DAErp\Service\Supplier\Supplier',
            'entity'     => 'DAErp\Entity\Supplier\Supplier',
        ],
    ],

    'service_rest_controller' => [
        'DAErp\Controller\Manufacturer\ManufacturersRest' => [
            'class_name' => 'DAErp\Controller\Manufacturer\ManufacturersRestController',
            'service'    => 'DAErp\Service\Manufacturer\Manufacturer',
        ],
        'DAErp\Controller\Product\CategoriesRest'         => [
            'class_name' => 'DAErp\Controller\Product\CategoriesRestController',
            'service'    => 'DAErp\Service\Product\Category',
        ],
        'DAErp\Controller\Product\DepartmentsRest'        => [
            'class_name' => 'DAErp\Controller\Product\DepartmentsRestController',
            'service'    => 'DAErp\Service\Product\Department',
        ],
        'DAErp\Controller\Product\GroupsRest'             => [
            'class_name' => 'DAErp\Controller\Product\GroupsRestController',
            'service'    => 'DAErp\Service\Product\Group',
        ],
        'DAErp\Controller\Product\FeaturesRest'           => [
            'class_name' => 'DAErp\Controller\Product\FeaturesRestController',
            'service'    => 'DAErp\Service\Product\Feature',
        ],
        'DAErp\Controller\Product\RatingsRest'            => [
            'class_name' => 'DAErp\Controller\Product\RatingsRestController',
            'service'    => 'DAErp\Service\Product\Rating',
        ],
        'DAErp\Controller\Product\MixProductsRest'        => [
            'class_name' => 'DAErp\Controller\Product\MixProductsRestController',
            'service'    => 'DAErp\Service\Product\MixProduct',
        ],
        'DAErp\Controller\Product\ProductsRest'           => [
            'class_name' => 'DAErp\Controller\Product\ProductsRestController',
            'service'    => 'DAErp\Service\Product\Product',
        ],
        'DAErp\Controller\Supplier\SuppliersRest'         => [
            'class_name' => 'DAErp\Controller\Supplier\SuppliersRestController',
            'service'    => 'DAErp\Service\Supplier\Supplier',
        ],
    ],
    'view_manager'            => [
        'template_map'        => [
            'layout/erp' => __DIR__ . '/../view/layout/layout.erp.phtml',
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
                    'enum_devolutionstatus'  => 'DAErp\Enum\DevolutionStatus',
                    'enum_discounttype'      => 'DAErp\Enum\DiscountType',
                    'enum_discrepancytype'   => 'DAErp\Enum\DiscrepancyType',
                    'enum_ordertatus'        => 'DAErp\Enum\OrderStatus',
                    'enum_paymentmethod'     => 'DAErp\Enum\PaymentMethod',
                    'enum_paymentstatus'     => 'DAErp\Enum\PaymentStatus',
                    'enum_paymenttype'       => 'DAErp\Enum\PaymentType',
                    'enum_placedestination'  => 'DAErp\Enum\PlaceDestination',
                    'enum_productstatus'     => 'DAErp\Enum\ProductStatus',
                    'enum_reservationstatus' => 'DAErp\Enum\ReservationStatus',
                    'enum_shippingtype'      => 'DAErp\Enum\ShippingType',
                    'enum_storetatus'        => 'DAErp\Enum\StoreStatus',
                    'enum_supplierstatus'    => 'DAErp\Enum\SupplierStatus',
                    'enum_unittype'          => 'DAErp\Enum\UnitType',
                ],
            ],
        ],
        'entity_resolver' => [
            'orm_default' => [
                'resolvers' => [
                    'DACore\IEntities\Erp\Financial\PaymentInterface'             => 'DAErp\Entity\Financial\Payment',

                    'DACore\IEntities\Erp\Inventory\Parked\DevolutionInterface'   => 'DAErp\Entity\Inventory\Parked\Devolution',
                    'DACore\IEntities\Erp\Inventory\Parked\DiscrepancyInterface'  => 'DAErp\Entity\Inventory\Parked\Discrepancy',
                    'DACore\IEntities\Erp\Inventory\Parked\LocationInterface'     => 'DAErp\Entity\Inventory\Parked\Location',
                    'DACore\IEntities\Erp\Inventory\Parked\ReservationInterface'  => 'DAErp\Entity\Inventory\Parked\Reservation',
                    'DACore\IEntities\Erp\Inventory\Warehouse\PlaceInterface'     => 'DAErp\Entity\Inventory\Warehouse\Place',
                    'DACore\IEntities\Erp\Inventory\Warehouse\StorageInterface'   => 'DAErp\Entity\Inventory\Warehouse\Storage',
                    'DACore\IEntities\Erp\Inventory\Warehouse\WarehouseInterface' => 'DAErp\Entity\Inventory\Warehouse\Warehouse',

                    'DACore\IEntities\Erp\Manufacturer\ManufacturerInterface'     => 'DAErp\Entity\Manufacturer\Manufacturer',

                    'DACore\IEntities\Erp\Order\OrderSuperclassInterface'         => 'DAErp\Entity\Order\OrderSuperclass',
                    'DACore\IEntities\Erp\Order\Store\OrderInterface'             => 'DAErp\Entity\Order\Store\Order',
                    'DACore\IEntities\Erp\Order\Store\StoreInterface'             => 'DAErp\Entity\Order\Store\Store',

                    'DACore\IEntities\Erp\Product\CategoryInterface'              => 'DAErp\Entity\Product\Category',
                    'DACore\IEntities\Erp\Product\DepartmentInterface'            => 'DAErp\Entity\Product\Department',
                    'DACore\IEntities\Erp\Product\FeatureInterface'               => 'DAErp\Entity\Product\Feature',
                    'DACore\IEntities\Erp\Product\GroupInterface'                 => 'DAErp\Entity\Product\Group',
                    'DACore\IEntities\Erp\Product\MixProductInterface'            => 'DAErp\Entity\Product\MixProduct',
                    'DACore\IEntities\Erp\Product\ProductInterface'               => 'DAErp\Entity\Product\Product',
                    'DACore\IEntities\Erp\Product\RatingInterface'                => 'DAErp\Entity\Product\Rating',

                    'DACore\IEntities\Erp\Promotion\CouponInterface'              => 'DAErp\Entity\Promotion\Coupon',

                    'DACore\IEntities\Erp\Shipper\ShipperInterface'              => 'DAErp\Entity\Shipper\Shipper',

                    'DACore\IEntities\Erp\Supplier\SupplierInterface'             => 'DAErp\Entity\Supplier\Supplier',
                    'DACore\IEntities\Erp\Supplier\BudgetInterface'               => 'DAErp\Entity\Supplier\Budget',
                    'DACore\IEntities\Erp\Supplier\QualityRatingInterface'        => 'DAErp\Entity\Supplier\QualityRating',
                    'DACore\IEntities\Erp\Supplier\ProductBudgetInterface'        => 'DAErp\Entity\Supplier\ProductBudget',

                    /*'DACore\IEntities\Erp\Order\Sale\OrderInterface' => 'DAErp\Entity\Order\Sale\Order',
                'DACore\IEntities\Erp\Order\Sale\SaleInterface' => 'DAErp\Entity\Order\Sale\Sale',*/
                ],
            ],
        ],
    ],
];
