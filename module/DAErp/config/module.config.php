<?php
namespace DAErp;

use Zend\Mvc\Router\Http\Hostname;
use Zend\Mvc\Router\Http\Literal;
use Zend\Mvc\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router'                  => [
        'routes' => [
            // ::: Financial Rest Routes :::
            'daerp-financial-payments-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/payments[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Financial\PaymentsRest',
                    ],
                ],
            ],

            // ::: Inventory Rest Routes :::
            // --- Parked ---
            'daerp-inventory-parked-devolutions-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/devolutions[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Inventory\Parked\DevolutionsRest',
                    ],
                ],
            ],
            'daerp-inventory-parked-discrepancies-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/discrepancies[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Inventory\Parked\DiscrepanciesRest',
                    ],
                ],
            ],
            'daerp-inventory-parked-locations-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/locations[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Inventory\Parked\LocationsRest',
                    ],
                ],
            ],
            'daerp-inventory-parked-reservations-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/reservations[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Inventory\Parked\ReservationsRest',
                    ],
                ],
            ],
            // --- Warehouse ---
            'daerp-inventory-warehouse-places-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/places[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Inventory\Warehouse\PlacesRest',
                    ],
                ],
            ],
            'daerp-inventory-warehouse-storages-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/storages[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Inventory\Warehouse\StoragesRest',
                    ],
                ],
            ],
            'daerp-inventory-warehouse-warehouses-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/warehouses[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Inventory\Warehouse\WarehousesRest',
                    ],
                ],
            ],

            // ::: Manufacturer Rest Routes ::
            'daerp-manufacturer-manufacturers-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/manufacturers[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Manufacturer\ManufacturersRest',
                    ],
                ],
            ],

            // ::: Order Rest Routes :::
            // --- Store ---
            'daerp-order-store-orders-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/orders-stores[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DABase\Controller\Order\Store\OrdersRest',
                    ],
                ],
            ],
            'daerp-order-store-stores-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/stores[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DABase\Controller\Order\Store\StoresRest',
                    ],
                ],
            ],

            // ::: Product Rest Routes :::
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
            
            // ::: Promotion Rest Routes :::
            'daerp-promotion-coupons-rest'            => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/coupons[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DABase\Controller\Promotion\CouponsRest',
                    ],
                ],
            ],

            // ::: Shipper Rest Routes :::
            'daerp-shipper-shippers-rest'            => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/shippers[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DABase\Controller\Shipper\ShippersRest',
                    ],
                ],
            ],
            'daerp-shipper-timely-ratings-rest'            => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/timely-ratings[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DABase\Controller\Shipper\TimelyRatingsRest',
                    ],
                ],
            ],

            // ::: Supplier Rest Routes :::
            'daerp-supplier-budgets-rest'          => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/budgets[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Supplier\BudgetsRest',
                    ],
                ],
            ],
            'daerp-supplier-product-budgets-rest'          => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/product-budgets[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Supplier\ProductBudgets',
                    ],
                ],
            ],
            'daerp-supplier-quality-ratings-rest'          => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/quality-ratings[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Supplier\QualityRatingsRest',
                    ],
                ],
            ],
            'daerp-supplier-suppliers-rest'          => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/suppliers[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Supplier\SuppliersRest',
                    ],
                ],
            ],


            // ::: END OF REST API ROUTES :::

            // ::: Subdomain && Rendered Http Routes
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
        // ::: Financial Services :::
        'DAErp\Service\Financial\Payment' => [
            'class_name' => 'DAErp\Service\Financial\Payment',
            'entity'     => 'DAErp\Entity\Financial\Payment',
        ],

        // ::: Inventory Services :::
        // --- Parked ---
        'DAErp\Service\Inventory\Parked\Devolution' => [
            'class_name' => 'DAErp\Service\Inventory\Parked\Devolution',
            'entity'     => 'DAErp\Entity\Inventory\Parked\Devolution',
        ],
        'DAErp\Service\Inventory\Parked\Discrepancy' => [
            'class_name' => 'DAErp\Service\Inventory\Parked\Discrepancy',
            'entity'     => 'DAErp\Entity\Inventory\Parked\Discrepancy',
        ],
        'DAErp\Service\Inventory\Parked\Location' => [
            'class_name' => 'DAErp\Service\Inventory\Parked\Location',
            'entity'     => 'DAErp\Entity\Inventory\Parked\Location',
        ],
        'DAErp\Service\Inventory\Parked\Reservation' => [
            'class_name' => 'DAErp\Service\Inventory\Parked\Reservation',
            'entity'     => 'DAErp\Entity\Inventory\Parked\Reservation',
        ],
        // --- Warehouse ---
        'DAErp\Service\Inventory\Warehouse\Place' => [
            'class_name' => 'DAErp\Service\Inventory\Warehouse\Place',
            'entity'     => 'DAErp\Entity\Inventory\Warehouse\Place',
        ],
        'DAErp\Service\Inventory\Warehouse\Storage' => [
            'class_name' => 'DAErp\Service\Inventory\Warehouse\Storage',
            'entity'     => 'DAErp\Entity\Inventory\Warehouse\Storage',
        ],
        'DAErp\Service\Inventory\Warehouse\Warehouse' => [
            'class_name' => 'DAErp\Service\Inventory\Warehouse\Warehouse',
            'entity'     => 'DAErp\Entity\Inventory\Warehouse\Warehouse',
        ],

        // ::: Manufacturer Services ::
        'DAErp\Service\Manufacturer\Manufacturer' => [
            'class_name' => 'DAErp\Service\Manufacturer\Manufacturer',
            'entity'     => 'DAErp\Entity\Manufacturer\Manufacturer',
        ],

        // ::: Order Services :::
        // --- Store ---
        'DAErp\Service\Order\Store\Order' => [
            'class_name' => 'DAErp\Service\Order\Store\Order',
            'entity'     => 'DAErp\Entity\Order\Store\Order',
        ],
        'DAErp\Service\Order\Store\Store' => [
            'class_name' => 'DAErp\Service\Order\Store\Store',
            'entity'     => 'DAErp\Entity\Order\Store\Store',
        ],


        // ::: Product Services :::
        'DAErp\Service\Product\Category'          => [
            'class_name' => 'DAErp\Service\Product\Category',
            'entity'     => 'DAErp\Entity\Product\Category',
        ],
        'DAErp\Service\Product\Department'        => [
            'class_name' => 'DAErp\Service\Product\Department',
            'entity'     => 'DAErp\Entity\Product\Department',
        ],
        'DAErp\Service\Product\Feature'           => [
            'class_name' => 'DAErp\Service\Product\Feature',
            'entity'     => 'DAErp\Entity\Product\Feature',
        ],
        'DAErp\Service\Product\Group'             => [
            'class_name' => 'DAErp\Service\Product\Group',
            'entity'     => 'DAErp\Entity\Product\Group',
        ],
        'DAErp\Service\Product\MixProduct'        => [
            'class_name' => 'DAErp\Service\Product\MixProduct',
            'entity'     => 'DAErp\Entity\Product\MixProduct',
        ],
        'DAErp\Service\Product\Product'           => [
            'class_name' => 'DAErp\Service\Product\Product',
            'entity'     => 'DAErp\Entity\Product\Product',
        ],
        'DAErp\Service\Product\Rating'            => [
            'class_name' => 'DAErp\Service\Product\Rating',
            'entity'     => 'DAErp\Entity\Product\Rating',
        ],

        // ::: Promotion Services :::
        'DAErp\Service\Promotion\Coupon'            => [
            'class_name' => 'DAErp\Service\Promotion\Coupon',
            'entity'     => 'DAErp\Entity\Promotion\Coupon',
        ],

        // ::: Shipper Services :::
        'DAErp\Service\Shipper\Shipper'            => [
            'class_name' => 'DAErp\Service\Shipper\Shipper',
            'entity'     => 'DAErp\Entity\Shipper\Shipper',
        ],
        'DAErp\Service\Shipper\TimelyRating'            => [
            'class_name' => 'DAErp\Service\Shipper\TimelyRating',
            'entity'     => 'DAErp\Entity\Shipper\TimelyRating',
        ],

        // ::: Supplier Services :::
        'DAErp\Service\Supplier\Budget'         => [
            'class_name' => 'DAErp\Service\Supplier\Budget',
            'entity'     => 'DAErp\Entity\Supplier\Budget',
        ],
        'DAErp\Service\Supplier\ProductBudget'         => [
            'class_name' => 'DAErp\Service\Supplier\ProductBudget',
            'entity'     => 'DAErp\Entity\Supplier\ProductBudget',
        ],
        'DAErp\Service\Supplier\QualityRating'         => [
            'class_name' => 'DAErp\Service\Supplier\QualityRating',
            'entity'     => 'DAErp\Entity\Supplier\QualityRating',
        ],
        'DAErp\Service\Supplier\Supplier'         => [
            'class_name' => 'DAErp\Service\Supplier\Supplier',
            'entity'     => 'DAErp\Entity\Supplier\Supplier',
        ],

    ],

    'service_rest_controller' => [
        // ::: Financial Controllers :::
        'DAErp\Controller\Financial\PaymentsRest' => [
            'class_name' => 'DAErp\Controller\Financial\PaymentsRestController',
            'service'    => 'DAErp\Service\Financial\Payment',
        ],

        // ::: Inventory Controllers :::
        // --- Parked ---
        'DAErp\Controller\Inventory\Parked\DevolutionsRest' => [
            'class_name' => 'DAErp\Controller\Inventory\Parked\DevolutionsRestController',
            'service'    => 'DAErp\Service\Inventory\Parked\Devolution',
        ],
        'DAErp\Controller\Inventory\Parked\DiscrepanciesRest' => [
            'class_name' => 'DAErp\Controller\Inventory\Parked\DiscrepanciesRestController',
            'service'    => 'DAErp\Service\Inventory\Parked\Discrepancy',
        ],
        'DAErp\Controller\Inventory\Parked\LocationsRest' => [
            'class_name' => 'DAErp\Controller\Inventory\Parked\LocationsRestController',
            'service'    => 'DAErp\Service\Inventory\Parked\Location',
        ],
        'DAErp\Controller\Inventory\Parked\ReservationsRest' => [
            'class_name' => 'DAErp\Controller\Inventory\Parked\ReservationsRestController',
            'service'    => 'DAErp\Service\Inventory\Parked\Reservation',
        ],
        // --- Warehouse ---
        'DAErp\Controller\Inventory\Warehouse\PlacesRest' => [
            'class_name' => 'DAErp\Controller\Inventory\Warehouse\PlacesRestController',
            'service'    => 'DAErp\Service\Inventory\Warehouse\Place',
        ],
        'DAErp\Controller\Inventory\Warehouse\StoragesRest' => [
            'class_name' => 'DAErp\Controller\Inventory\Warehouse\StoragesRestController',
            'service'    => 'DAErp\Service\Inventory\Warehouse\Storage',
        ],
        'DAErp\Controller\Inventory\Warehouse\WarehousesRest' => [
            'class_name' => 'DAErp\Controller\Inventory\Warehouse\WarehousesRestController',
            'service'    => 'DAErp\Service\Inventory\Warehouse\Warehouse',
        ],

        // ::: Manufacturer Controllers ::
        'DAErp\Controller\Manufacturer\ManufacturersRest' => [
            'class_name' => 'DAErp\Controller\Manufacturer\ManufacturersRestController',
            'service'    => 'DAErp\Service\Manufacturer\Manufacturer',
        ],

        // ::: Order Controllers :::
        // --- Store ---
        'DAErp\Controller\Order\Store\OrdersRest' => [
            'class_name' => 'DAErp\Controller\Order\Store\OrdersRestController',
            'service'    => 'DAErp\Service\Order\Store\Order',
        ],
        'DAErp\Controller\Order\Store\StoresRest' => [
            'class_name' => 'DAErp\Controller\Order\Store\StoresRestController',
            'service'    => 'DAErp\Service\Order\Store\Store',
        ],

        // ::: Product Controllers :::
        'DAErp\Controller\Product\CategoriesRest'         => [
            'class_name' => 'DAErp\Controller\Product\CategoriesRestController',
            'service'    => 'DAErp\Service\Product\Category',
        ],
        'DAErp\Controller\Product\DepartmentsRest'        => [
            'class_name' => 'DAErp\Controller\Product\DepartmentsRestController',
            'service'    => 'DAErp\Service\Product\Department',
        ],
        'DAErp\Controller\Product\FeaturesRest'           => [
            'class_name' => 'DAErp\Controller\Product\FeaturesRestController',
            'service'    => 'DAErp\Service\Product\Feature',
        ],
        'DAErp\Controller\Product\GroupsRest'             => [
            'class_name' => 'DAErp\Controller\Product\GroupsRestController',
            'service'    => 'DAErp\Service\Product\Group',
        ],
        'DAErp\Controller\Product\MixProductsRest'        => [
            'class_name' => 'DAErp\Controller\Product\MixProductsRestController',
            'service'    => 'DAErp\Service\Product\MixProduct',
        ],
        'DAErp\Controller\Product\ProductsRest'           => [
            'class_name' => 'DAErp\Controller\Product\ProductsRestController',
            'service'    => 'DAErp\Service\Product\Product',
        ],
        'DAErp\Controller\Product\RatingsRest'            => [
            'class_name' => 'DAErp\Controller\Product\RatingsRestController',
            'service'    => 'DAErp\Service\Product\Rating',
        ],

        // ::: Promotion Controllers :::
        'DAErp\Controller\Promotion\CouponsRest'         => [
            'class_name' => 'DAErp\Controller\Promotion\CouponsRestController',
            'service'    => 'DAErp\Service\Promotion\Coupon',
        ],

        // ::: Shipper Controllers :::
        'DAErp\Controller\Shipper\ShippersRest'         => [
            'class_name' => 'DAErp\Controller\Shipper\ShippersRestController',
            'service'    => 'DAErp\Service\Shipper\Shipper',
        ],
        'DAErp\Controller\Shipper\TimelyRatingsRest'         => [
            'class_name' => 'DAErp\Controller\Shipper\TimelyRatingsRestController',
            'service'    => 'DAErp\Service\Shipper\TimelyRating',
        ],

        // ::: Supplier Controllers :::
        'DAErp\Controller\Supplier\BudgetsRest'         => [
            'class_name' => 'DAErp\Controller\Supplier\BudgetsRestController',
            'service'    => 'DAErp\Service\Supplier\Budget',
        ],
        'DAErp\Controller\Supplier\ProductBudgetsRest'         => [
            'class_name' => 'DAErp\Controller\Supplier\ProductBudgetsRestController',
            'service'    => 'DAErp\Service\Supplier\ProductBudget',
        ],
        'DAErp\Controller\Supplier\QualityRatingsRest'         => [
            'class_name' => 'DAErp\Controller\Supplier\QualityRatingsRestController',
            'service'    => 'DAErp\Service\Supplier\QualityRating',
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
