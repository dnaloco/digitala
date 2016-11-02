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
            // --- Accounts ---
            'daerp-financial-bank-accounts-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/bank-accounts[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Financial\Accounts\BankAccountsRest',
                    ],
                ],
            ],
            'daerp-financial-credit-accounts-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/credit-accounts[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Financial\Accounts\CreditAccountsRest',
                    ],
                ],
            ],
            'daerp-financial-money-accounts-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/money-accounts[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Financial\Accounts\MoneyAccountsRest',
                    ],
                ],
            ],
            // --- root ---
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
            'daerp-financial-taxes-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/taxes[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Financial\TaxesRest',
                    ],
                ],
            ],

            // ::: Human Resource Rest Routes :::
            // --- Monitoring ---
            'daerp-human-resource-monitoring-evaluation-ratings-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/evaluation-ratings[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\HumanResource\Monitoring\EvaluationRatingsRest',
                    ],
                ],
            ],
            'daerp-human-resource-monitoring-evaluations-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/evaluations[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\HumanResource\Monitoring\EvaluationsRest',
                    ],
                ],
            ],
            'daerp-human-resource-monitoring-time-punch-clocks-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/time-punch-clocks[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\HumanResource\Monitoring\TimePunchClocksRest',
                    ],
                ],
            ],
            // --- Organization ---
            'daerp-human-resource-organization-burdens-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/burdens[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\HumanResource\Organization\BurdensRest',
                    ],
                ],
            ],
            'daerp-human-resource-organization-org-departments-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/org-departments[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\HumanResource\Organization\DepartmentsRest',
                    ],
                ],
            ],
            'daerp-human-resource-organization-occupations-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/occupations[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\HumanResource\Organization\OccupationsRest',
                    ],
                ],
            ],
            // --- Partner ---
            'daerp-human-resource-partner-copartners-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/copartners[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\HumanResource\Partner\CopartnersRest',
                    ],
                ],
            ],
            'daerp-human-resource-partner-employees-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/employees[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\HumanResource\Partner\EmployeesRest',
                    ],
                ],
            ],
            // --- Recruitment ---
            'daerp-human-resource-recruitment-candidates-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/candidates[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\HumanResource\Recruitment\CandidatesRest',
                    ],
                ],
            ],
            'daerp-human-resource-recruitment-curriculums-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/curriculums[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\HumanResource\Recruitment\CurriculumsRest',
                    ],
                ],
            ],
            // --- Support ---
            'daerp-human-resource-support-syndicates-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/syndicates[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\HumanResource\Support\SyndicatesRest',
                    ],
                ],
            ],
            'daerp-human-resource-support-trainings-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/trainings[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\HumanResource\Support\TrainingsRest',
                    ],
                ],
            ],
            // --- Wage ---
            'daerp-human-resource-wage-benefits-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/benefits[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\HumanResource\Wage\BenefitsRest',
                    ],
                ],
            ],
            'daerp-human-resource-wage-salaries-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/salaries[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\HumanResource\Wage\SalariesRest',
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

            // ::: My Business Rest Routes :::
            'daerp-my-business-matrix-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/matrix[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\MyBusiness\MatrixRest',
                    ],
                ],
            ],
            'daerp-my-business-subsidiaries-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/subsidiaries[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\MyBusiness\SubsidiariesRest',
                    ],
                ],
            ],

            // ::: Order Rest Routes :::
            // --- Expense ---
            'daerp-order-expense-expense-categories-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/expense-categories[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Order\Expense\ExpenseCategoriesRest',
                    ],
                ],
            ],
            'daerp-order-expense-order-expenses-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/order-expenses[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Order\Expense\ExpensesRest',
                    ],
                ],
            ],
            'daerp-order-expense-orders-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/expense-orders[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Order\Expense\OrdersRest',
                    ],
                ],
            ],
            // --- Production ---
            'daerp-order-production-production-orders-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/production-orders[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Order\Production\OrdersRest',
                    ],
                ],
            ],
            'daerp-order-production-processes-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/processes[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Order\Production\ProcessesRest',
                    ],
                ],
            ],
            'daerp-order-production-product-processes-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/product-processes[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Order\Production\ProductProcessesRest',
                    ],
                ],
            ],
            'daerp-order-production-productions-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/productions[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Order\Production\ProductionsRest',
                    ],
                ],
            ],
            'daerp-order-production-raw-materials-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/raw-materials[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Order\Production\RawMaterialsRest',
                    ],
                ],
            ],
            // --- Rental ---
            'daerp-order-rental-orders-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/rental-orders[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Order\Rental\OrdersRest',
                    ],
                ],
            ],
            'daerp-order-rentals-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/order-rentals[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Order\Rental\RentalsRest',
                    ],
                ],
            ],
            // --- Sale ---
            'daerp-order-sale-orders-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/sale-orders[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Order\Sale\OrdersRest',
                    ],
                ],
            ],
            'daerp-order-sales-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/order-sales[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Order\Sales\SalesRest',
                    ],
                ],
            ],
            // --- Service ---
            'daerp-order-service-orders-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/service-orders[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Order\Service\OrdersRest',
                    ],
                ],
            ],
            'daerp-order-services-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/order-services[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Order\Service\ServicesRest',
                    ],
                ],
            ],
            // --- Store ---
            'daerp-order-store-orders-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/store-orders[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Order\Store\OrdersRest',
                    ],
                ],
            ],
            'daerp-order-store-stores-rest' => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/order-stores[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Order\Store\StoresRest',
                    ],
                ],
            ],

            // ::: Product Rest Routes :::
            'daerp-product-categories-rest'         => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/product-categories[/:id]',
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
                    'route'       => '/api/private/product-departments[/:id]',
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
                    'route'       => '/api/private/product-features[/:id]',
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
                    'route'       => '/api/private/product-groups[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Product\GroupsRest',
                    ],
                ],
            ],
            'daerp-product-products-rest'           => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/products[/:id]',
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
                    'route'       => '/api/private/product-ratings[/:id]',
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
                        'controller' => 'DAErp\Controller\Promotion\CouponsRest',
                    ],
                ],
            ],
            'daerp-promotion-market-promotions-rest'            => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/market-promotions[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Promotion\MarketPromotionsRest',
                    ],
                ],
            ],
            'daerp-promotion-store-promotions-rest'            => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/store-promotions[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Promotion\StorePromotionsRest',
                    ],
                ],
            ],

            // ::: Service Rest Routes :::
            'daerp-service-services-rest'            => [
                'type'    => 'Segment',
                'options' => [
                    'route'       => '/api/private/services[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'DAErp\Controller\Service\ServicesRest',
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
                        'controller' => 'DAErp\Controller\Shipper\ShippersRest',
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
                        'controller' => 'DAErp\Controller\Shipper\TimelyRatingsRest',
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
                            'daerp-my-business' => array(
                                'type'          => Literal::class,
                                'options'       => array(
                                    'route'    => 'meu-negocio/',
                                    'defaults' => array(
                                        'controller' => Controller\IndexController::class,
                                        'action'     => 'index',
                                    ),
                                ),
                                'may_terminate' => false,
                                'child_routes'  => array(
                                    'daerp-my-business-matrix'           => array(
                                        'type'    => Segment::class,
                                        'options' => array(
                                            'route'    => 'matriz[/]',
                                            'defaults' => array(
                                                'controller' => Controller\IndexController::class,
                                                'action'     => 'index',
                                            ),
                                        ),
                                    ),
                                    'daerp-my-business-subsidiaries'           => array(
                                        'type'    => Segment::class,
                                        'options' => array(
                                            'route'    => 'filiais[/]',
                                            'defaults' => array(
                                                'controller' => Controller\IndexController::class,
                                                'action'     => 'index',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'daerp-financial' => array(
                                'type'          => Literal::class,
                                'options'       => array(
                                    'route'    => 'financeiro/',
                                    'defaults' => array(
                                        'controller' => Controller\IndexController::class,
                                        'action'     => 'index',
                                    ),
                                ),
                                'may_terminate' => false,
                                'child_routes'  => array(
                                    'daerp-financial-accounts'           => array(
                                        'type'    => Segment::class,
                                        'options' => array(
                                            'route'    => 'contas[/]',
                                            'defaults' => array(
                                                'controller' => Controller\IndexController::class,
                                                'action'     => 'index',
                                            ),
                                        ),
                                    ),
                                    'daerp-financial-payments'           => array(
                                        'type'    => Segment::class,
                                        'options' => array(
                                            'route'    => 'pagamentos[/]',
                                            'defaults' => array(
                                                'controller' => Controller\IndexController::class,
                                                'action'     => 'index',
                                            ),
                                        ),
                                    ),
                                    'daerp-financial-taxes'           => array(
                                        'type'    => Segment::class,
                                        'options' => array(
                                            'route'    => 'impostos[/]',
                                            'defaults' => array(
                                                'controller' => Controller\IndexController::class,
                                                'action'     => 'index',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'daerp-human-resource' => array(
                                'type'          => Literal::class,
                                'options'       => array(
                                    'route'    => 'recursos-humanos/',
                                    'defaults' => array(
                                        'controller' => Controller\IndexController::class,
                                        'action'     => 'index',
                                    ),
                                ),
                                'may_terminate' => false,
                                'child_routes'  => array(
                                    'daerp-human-resource-monitoring'           => array(
                                        'type'    => Segment::class,
                                        'options' => array(
                                            'route'    => 'monitoramento[/]',
                                            'defaults' => array(
                                                'controller' => Controller\IndexController::class,
                                                'action'     => 'index',
                                            ),
                                        ),
                                    ),
                                    'daerp-human-resource-organization'           => array(
                                        'type'    => Segment::class,
                                        'options' => array(
                                            'route'    => 'organizacao[/]',
                                            'defaults' => array(
                                                'controller' => Controller\IndexController::class,
                                                'action'     => 'index',
                                            ),
                                        ),
                                    ),
                                    'daerp-human-resource-partners'           => array(
                                        'type'    => Segment::class,
                                        'options' => array(
                                            'route'    => 'colaboradores[/]',
                                            'defaults' => array(
                                                'controller' => Controller\IndexController::class,
                                                'action'     => 'index',
                                            ),
                                        ),
                                    ),
                                    'daerp-human-resource-recruitment'           => array(
                                        'type'    => Segment::class,
                                        'options' => array(
                                            'route'    => 'recrutamento[/]',
                                            'defaults' => array(
                                                'controller' => Controller\IndexController::class,
                                                'action'     => 'index',
                                            ),
                                        ),
                                    ),
                                    'daerp-human-resource-support'           => array(
                                        'type'    => Segment::class,
                                        'options' => array(
                                            'route'    => 'suporte[/]',
                                            'defaults' => array(
                                                'controller' => Controller\IndexController::class,
                                                'action'     => 'index',
                                            ),
                                        ),
                                    ),
                                    'daerp-human-resource-wage'           => array(
                                        'type'    => Segment::class,
                                        'options' => array(
                                            'route'    => 'remuneracao[/]',
                                            'defaults' => array(
                                                'controller' => Controller\IndexController::class,
                                                'action'     => 'index',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'daerp-inventory' => array(
                                'type'          => Literal::class,
                                'options'       => array(
                                    'route'    => 'inventario/',
                                    'defaults' => array(
                                        'controller' => Controller\IndexController::class,
                                        'action'     => 'index',
                                    ),
                                ),
                                'may_terminate' => true,
                                'child_routes'  => array(
                                    'daerp-inventory-parkeds'           => array(
                                        'type'    => Segment::class,
                                        'options' => array(
                                            'route'    => 'estacionados[/]',
                                            'defaults' => array(
                                                'controller' => Controller\IndexController::class,
                                                'action'     => 'index',
                                            ),
                                        ),
                                    ),
                                    'daerp-inventory-warehouses'           => array(
                                        'type'    => Segment::class,
                                        'options' => array(
                                            'route'    => 'armazens[/]',
                                            'defaults' => array(
                                                'controller' => Controller\IndexController::class,
                                                'action'     => 'index',
                                            ),
                                        ),
                                    ),
                                    'daerp-inventory-storages'           => array(
                                        'type'    => Segment::class,
                                        'options' => array(
                                            'route'    => 'estoques[/]',
                                            'defaults' => array(
                                                'controller' => Controller\IndexController::class,
                                                'action'     => 'index',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            'daerp-manufacturers' => array(
                                'type'          => Segment::class,
                                'options'       => array(
                                    'route'    => 'fabricantes[/]',
                                    'defaults' => array(
                                        'controller' => Controller\IndexController::class,
                                        'action'     => 'index',
                                    ),
                                ),
                                'may_terminate' => true
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
                                'may_terminate' => true
                            ),
                            /*'daerp-products' => array(
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
                                    'daerp-save-product'           => array(
                                        'type'    => Segment::class,
                                        'options' => array(
                                            'route'    => 'novo[/]',
                                            'defaults' => array(
                                                'controller' => Controller\IndexController::class,
                                                'action'     => 'index',
                                            ),
                                        ),
                                    ),
                                ),
                            ),*/
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
        // --- Accounts ---
        'DAErp\Service\Financial\Accounts\Bank' => [
            'class_name' => 'DAErp\Service\Financial\Accounts\Bank',
            'entity'     => 'DAErp\Entity\Financial\Accounts\Bank',
        ],
        'DAErp\Service\Financial\Accounts\Credit' => [
            'class_name' => 'DAErp\Service\Financial\Accounts\Credit',
            'entity'     => 'DAErp\Entity\Financial\Accounts\Credit',
        ],
        'DAErp\Service\Financial\Accounts\Money' => [
            'class_name' => 'DAErp\Service\Financial\Accounts\Money',
            'entity'     => 'DAErp\Entity\Financial\Accounts\Money',
        ],
        // --- root ---
        'DAErp\Service\Financial\Payment' => [
            'class_name' => 'DAErp\Service\Financial\Payment',
            'entity'     => 'DAErp\Entity\Financial\Payment',
        ],
        'DAErp\Service\Financial\Tax' => [
            'class_name' => 'DAErp\Service\Financial\Tax',
            'entity'     => 'DAErp\Entity\Financial\Tax',
        ],

        // ::: Human Resource Services :::
        // --- Monitoring ---
        'DAErp\Entity\HumanResource\Monitoring\Evaluation' => [
            'class_name' => 'DAErp\Service\HumanResource\Monitoring\Evaluation',
            'entity'     => 'DAErp\Entity\HumanResource\Monitoring\Evaluation',
        ],
        'DAErp\Entity\HumanResource\Monitoring\EvalutionRating' => [
            'class_name' => 'DAErp\Service\HumanResource\Monitoring\EvalutionRating',
            'entity'     => 'DAErp\Entity\HumanResource\Monitoring\EvalutionRating',
        ],
        'DAErp\Entity\HumanResource\Monitoring\TimePunchClock' => [
            'class_name' => 'DAErp\Service\HumanResource\Monitoring\TimePunchClock',
            'entity'     => 'DAErp\Entity\HumanResource\Monitoring\TimePunchClock',
        ],
        // --- Organization ---
        'DAErp\Entity\HumanResource\Organization\Burden' => [
            'class_name' => 'DAErp\Service\HumanResource\Organization\Burden',
            'entity'     => 'DAErp\Entity\HumanResource\Organization\Burden',
        ],
        'DAErp\Entity\HumanResource\Organization\Department' => [
            'class_name' => 'DAErp\Service\HumanResource\Organization\Department',
            'entity'     => 'DAErp\Entity\HumanResource\Organization\Department',
        ],
        'DAErp\Entity\HumanResource\Organization\Occupation' => [
            'class_name' => 'DAErp\Service\HumanResource\Organization\Occupation',
            'entity'     => 'DAErp\Entity\HumanResource\Organization\Occupation',
        ],
        // --- Partner ---
        'DAErp\Entity\HumanResource\Partner\Copartner' => [
            'class_name' => 'DAErp\Service\HumanResource\Partner\Copartner',
            'entity'     => 'DAErp\Entity\HumanResource\Partner\Copartner',
        ],
        'DAErp\Entity\HumanResource\Partner\Employee' => [
            'class_name' => 'DAErp\Service\HumanResource\Partner\Employee',
            'entity'     => 'DAErp\Entity\HumanResource\Partner\Employee',
        ],
        // --- Recruitment ---
        'DAErp\Entity\HumanResource\Recruitment\Candidate' => [
            'class_name' => 'DAErp\Service\HumanResource\Recruitment\Candidate',
            'entity'     => 'DAErp\Entity\HumanResource\Recruitment\Candidate',
        ],
        'DAErp\Entity\HumanResource\Recruitment\Curriculum' => [
            'class_name' => 'DAErp\Service\HumanResource\Recruitment\Curriculum',
            'entity'     => 'DAErp\Entity\HumanResource\Recruitment\Curriculum',
        ],
        // --- Support ---
        'DAErp\Entity\HumanResource\Support\Syndicate' => [
            'class_name' => 'DAErp\Service\HumanResource\Support\Syndicate',
            'entity'     => 'DAErp\Entity\HumanResource\Support\Syndicate',
        ],
        'DAErp\Entity\HumanResource\Support\Training' => [
            'class_name' => 'DAErp\Service\HumanResource\Support\Training',
            'entity'     => 'DAErp\Entity\HumanResource\Support\Training',
        ],
        // --- Wage ---
        'DAErp\Entity\HumanResource\Wage\Benefit' => [
            'class_name' => 'DAErp\Service\HumanResource\Wage\Benefit',
            'entity'     => 'DAErp\Entity\HumanResource\Wage\Benefit',
        ],
        'DAErp\Entity\HumanResource\Wage\Salary' => [
            'class_name' => 'DAErp\Service\HumanResource\Wage\Salary',
            'entity'     => 'DAErp\Entity\HumanResource\Wage\Salary',
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

        // ::: My Business Services :::
        'DAErp\Service\MyBusiness\Matrix' => [
            'class_name' => 'DAErp\Service\MyBusiness\Matrix',
            'entity'     => 'DAErp\Entity\MyBusiness\Matrix',
        ],

        'DAErp\Service\MyBusiness\Subsidiary' => [
            'class_name' => 'DAErp\Service\MyBusiness\Subsidiary',
            'entity'     => 'DAErp\Entity\MyBusiness\Subsidiary',
        ],

        // ::: Order Services :::
        // --- Expense ---
        'DAErp\Service\Order\Expense\ExpenseCategory' => [
            'class_name' => 'DAErp\Service\Order\Expense\ExpenseCategory',
            'entity'     => 'DAErp\Entity\Order\Expense\ExpenseCategory',
        ],
        'DAErp\Service\Order\Expense\Expense' => [
            'class_name' => 'DAErp\Service\Order\Expense\Expense',
            'entity'     => 'DAErp\Entity\Order\Expense\Expense',
        ],
        'DAErp\Service\Order\Expense\Order' => [
            'class_name' => 'DAErp\Service\Order\Expense\Order',
            'entity'     => 'DAErp\Entity\Order\Expense\Order',
        ],
        // --- Production ---
        'DAErp\Service\Order\Production\Order' => [
            'class_name' => 'DAErp\Service\Order\Production\Order',
            'entity'     => 'DAErp\Entity\Order\Production\Order',
        ],
        'DAErp\Service\Order\Production\Process' => [
            'class_name' => 'DAErp\Service\Order\Production\Process',
            'entity'     => 'DAErp\Entity\Order\Production\Process',
        ],
        'DAErp\Service\Order\Production\ProductProcess' => [
            'class_name' => 'DAErp\Service\Order\Production\ProductProcess',
            'entity'     => 'DAErp\Entity\Order\Production\ProductProcess',
        ],
        'DAErp\Service\Order\Production\Production' => [
            'class_name' => 'DAErp\Service\Order\Production\Production',
            'entity'     => 'DAErp\Entity\Order\Production\Production',
        ],
        'DAErp\Service\Order\Production\RawMaterial' => [
            'class_name' => 'DAErp\Service\Order\Production\RawMaterial',
            'entity'     => 'DAErp\Entity\Order\Production\RawMaterial',
        ],
        // --- Rental ---
        'DAErp\Service\Order\Rental\Order' => [
            'class_name' => 'DAErp\Service\Order\Rental\Order',
            'entity'     => 'DAErp\Entity\Order\Rental\Order',
        ],
        'DAErp\Service\Order\Rental\Rental' => [
            'class_name' => 'DAErp\Service\Order\Rental\Rental',
            'entity'     => 'DAErp\Entity\Order\Rental\Rental',
        ],
        // --- Sale ---
        'DAErp\Service\Order\Sale\Order' => [
            'class_name' => 'DAErp\Service\Order\Sale\Order',
            'entity'     => 'DAErp\Entity\Order\Sale\Order',
        ],
        'DAErp\Service\Order\Sale\Sale' => [
            'class_name' => 'DAErp\Service\Order\Sale\Sale',
            'entity'     => 'DAErp\Entity\Order\Sale\Sale',
        ],
        // --- Service ---
        'DAErp\Service\Order\Service\Order' => [
            'class_name' => 'DAErp\Service\Order\Service\Order',
            'entity'     => 'DAErp\Entity\Order\Service\Order',
        ],
        'DAErp\Service\Order\Service\Service' => [
            'class_name' => 'DAErp\Service\Order\Service\Service',
            'entity'     => 'DAErp\Entity\Order\Service\Service',
        ],
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
        'DAErp\Service\Promotion\MarketPromotion'            => [
            'class_name' => 'DAErp\Service\Promotion\MarketPromotion',
            'entity'     => 'DAErp\Entity\Promotion\MarketPromotion',
        ],
        'DAErp\Service\Promotion\StorePromotion'            => [
            'class_name' => 'DAErp\Service\Promotion\StorePromotion',
            'entity'     => 'DAErp\Entity\Promotion\StorePromotion',
        ],

        // ::: Service Services :::
        'DAErp\Service\Service\Service'            => [
            'class_name' => 'DAErp\Service\Service\Service',
            'entity'     => 'DAErp\Entity\Service\Service',
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
        // --- Accounts ---
        'DAErp\Controller\Financial\Accounts\BankAccountsRest' => [
            'class_name' => 'DAErp\Controller\Financial\Accounts\BankAccountsRestController',
            'service'    => 'DAErp\Service\Financial\Accounts\Bank',
        ],
        'DAErp\Controller\Financial\Accounts\CreditAccountsRest' => [
            'class_name' => 'DAErp\Controller\Financial\Accounts\CreditAccountsRestController',
            'service'    => 'DAErp\Service\Financial\Accounts\Credit',
        ],
        'DAErp\Controller\Financial\Accounts\MoneyAccountsRest' => [
            'class_name' => 'DAErp\Controller\Financial\Accounts\MoneyAccountsRestController',
            'service'    => 'DAErp\Service\Financial\Accounts\Money',
        ],
        // --- root ---
        'DAErp\Controller\Financial\PaymentsRest' => [
            'class_name' => 'DAErp\Controller\Financial\PaymentsRestController',
            'service'    => 'DAErp\Service\Financial\Payment',
        ],
        'DAErp\Controller\Financial\TaxesRest' => [
            'class_name' => 'DAErp\Controller\Financial\TaxesRestController',
            'service'    => 'DAErp\Service\Financial\Tax',
        ],

        // ::: Human Resource Controllers :::
        // --- Monitoring ---
        'DAErp\Controller\HumanResource\Monitoring\EvaluationRatingsRest' => [
            'class_name' => 'DAErp\Controller\HumanResource\Monitoring\EvaluationRatingsRestController',
            'service'    => 'DAErp\Entity\HumanResource\Monitoring\EvalutionRating',
        ],
        'DAErp\Controller\HumanResource\Monitoring\EvaluationsRest' => [
            'class_name' => 'DAErp\Controller\HumanResource\Monitoring\EvaluationsRestController',
            'service'    => 'DAErp\Entity\HumanResource\Monitoring\Evaluation',
        ],
        'DAErp\Controller\HumanResource\Monitoring\TimePunchClocksRest' => [
            'class_name' => 'DAErp\Controller\HumanResource\Monitoring\TimePunchClocksRestController',
            'service'    => 'DAErp\Entity\HumanResource\Monitoring\TimePunchClock',
        ],
        // --- Organization ---
        'DAErp\Controller\HumanResource\Organization\BurdensRest' => [
            'class_name' => 'DAErp\Controller\HumanResource\Organization\BurdensRestController',
            'service'    => 'DAErp\Entity\HumanResource\Organization\Burden',
        ],
        'DAErp\Controller\HumanResource\Organization\DepartmentsRest' => [
            'class_name' => 'DAErp\Controller\HumanResource\Organization\DepartmentsRestController',
            'service'    => 'DAErp\Entity\HumanResource\Organization\Department',
        ],
        'DAErp\Controller\HumanResource\Organization\OccupationsRest' => [
            'class_name' => 'DAErp\Controller\HumanResource\Organization\OccupationsRestController',
            'service'    => 'DAErp\Entity\HumanResource\Organization\Occupation',
        ],
        // --- Partner ---
        'DAErp\Controller\HumanResource\Partner\CopartnersRest' => [
            'class_name' => 'DAErp\Controller\HumanResource\Partner\CopartnersRestController',
            'service'    => 'DAErp\Entity\HumanResource\Partner\Copartner',
        ],
        'DAErp\Controller\HumanResource\Partner\EmployeesRest' => [
            'class_name' => 'DAErp\Controller\HumanResource\Partner\EmployeesRestController',
            'service'    => 'DAErp\Entity\HumanResource\Partner\Employee',
        ],
        // --- Recruitment ---
        'DAErp\Controller\HumanResource\Recruitment\CandidatesRest' => [
            'class_name' => 'DAErp\Controller\HumanResource\Recruitment\CandidatesRestController',
            'service'    => 'DAErp\Entity\HumanResource\Recruitment\Candidate',
        ],
        'DAErp\Controller\HumanResource\Recruitment\CurriculumsRest' => [
            'class_name' => 'DAErp\Controller\HumanResource\Recruitment\CurriculumsRestController',
            'service'    => 'DAErp\Entity\HumanResource\Recruitment\Curriculum',
        ],
        // --- Support ---
        'DAErp\Controller\HumanResource\Support\SyndicatesRest' => [
            'class_name' => 'DAErp\Controller\HumanResource\Support\SyndicatesRestController',
            'service'    => 'DAErp\Entity\HumanResource\Support\Syndicate',
        ],
        'DAErp\Controller\HumanResource\Support\TrainingsRest' => [
            'class_name' => 'DAErp\Controller\HumanResource\Support\TrainingsRestController',
            'service'    => 'DAErp\Entity\HumanResource\Support\Training',
        ],
        // --- Wage ---
        'DAErp\Controller\HumanResource\Wage\BenefitsRest' => [
            'class_name' => 'DAErp\Controller\HumanResource\Wage\BenefitsRestController',
            'service'    => 'DAErp\Entity\HumanResource\Wage\Benefit',
        ],
        'DAErp\Controller\HumanResource\Wage\SalariesRest' => [
            'class_name' => 'DAErp\Controller\HumanResource\Wage\SalariesRestController',
            'service'    => 'DAErp\Entity\HumanResource\Wage\Salary',
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

        // ::: My Business Controllers :::
        'DAErp\Controller\MyBusines\MatrixRest' => [
            'class_name' => 'DAErp\Controller\MyBusines\MatrixRestController',
            'service'    => 'DAErp\Service\MyBusines\Matrix',
        ],
        'DAErp\Controller\MyBusines\SubsidiariesRest' => [
            'class_name' => 'DAErp\Controller\MyBusines\SubsidiariesRestController',
            'service'    => 'DAErp\Service\MyBusines\Subsidiary',
        ],

        // ::: Order Controllers :::
        // --- Expense ---
        'DAErp\Controller\Order\Expense\ExpenseCategoriesRest' => [
            'class_name' => 'DAErp\Controller\Order\Expense\ExpenseCategoriesRestController',
            'service'    => 'DAErp\Service\Order\Expense\ExpenseCategory',
        ],
        'DAErp\Controller\Order\Expense\ExpensesRest' => [
            'class_name' => 'DAErp\Controller\Order\Expense\ExpensesRestController',
            'service'    => 'DAErp\Service\Order\Expense\Expense',
        ],
        'DAErp\Controller\Order\Expense\OrdersRest' => [
            'class_name' => 'DAErp\Controller\Order\Expense\OrdersRestController',
            'service'    => 'DAErp\Service\Order\Expense\Order',
        ],
        // --- Production ---
        'DAErp\Controller\Order\Production\OrdersRest' => [
            'class_name' => 'DAErp\Controller\Order\Production\OrdersRestController',
            'service'    => 'DAErp\Service\Order\Production\Order',
        ],
        'DAErp\Controller\Order\Production\ProcessesRest' => [
            'class_name' => 'DAErp\Controller\Order\Production\ProcessesRestController',
            'service'    => 'DAErp\Service\Order\Production\Process',
        ],
        'DAErp\Controller\Order\Production\ProductProcessesRest' => [
            'class_name' => 'DAErp\Controller\Order\Production\ProductProcessesRestController',
            'service'    => 'DAErp\Service\Order\Production\ProductProcess',
        ],
        'DAErp\Controller\Order\Production\ProductionsRest' => [
            'class_name' => 'DAErp\Controller\Order\Production\ProductionsRestController',
            'service'    => 'DAErp\Service\Order\Production\Production',
        ],
        'DAErp\Controller\Order\Production\RawMaterialsRest' => [
            'class_name' => 'DAErp\Controller\Order\Production\RawMaterialsRestController',
            'service'    => 'DAErp\Service\Order\Production\RawMaterial',
        ],
        // --- Rental ---
        'DAErp\Controller\Order\Rental\OrdersRest' => [
            'class_name' => 'DAErp\Controller\Order\Rental\OrdersRestController',
            'service'    => 'DAErp\Service\Order\Rental\Order',
        ],
        'DAErp\Controller\Order\Rental\RentalsRest' => [
            'class_name' => 'DAErp\Controller\Order\Rental\RentalsRestController',
            'service'    => 'DAErp\Service\Order\Rental\Rental',
        ],
        // --- Sale ---
        'DAErp\Controller\Order\Sale\OrdersRest' => [
            'class_name' => 'DAErp\Controller\Order\Sale\OrdersRestController',
            'service'    => 'DAErp\Service\Order\Sale\Order',
        ],
        'DAErp\Controller\Order\Sale\SalesRest' => [
            'class_name' => 'DAErp\Controller\Order\Sale\SalesRestController',
            'service'    => 'DAErp\Service\Order\Sale\Sale',
        ],
        // --- Service ---
        'DAErp\Controller\Order\Service\OrdersRest' => [
            'class_name' => 'DAErp\Controller\Order\Service\OrdersRestController',
            'service'    => 'DAErp\Service\Order\Service\Order',
        ],
        'DAErp\Controller\Order\Service\ServicesRest' => [
            'class_name' => 'DAErp\Controller\Order\Service\ServicesRestController',
            'service'    => 'DAErp\Service\Order\Service\Service',
        ],
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

        // ::: Service Controllers :::
        'DAErp\Controller\Service\ServicesRest'         => [
            'class_name' => 'DAErp\Controller\Service\ServicesRestController',
            'service'    => 'DAErp\Service\Service\Service',
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
                    'enum_costby'  => 'DAErp\Enum\CostBy',
                    'enum_destination'  => 'DAErp\Enum\Destination',
                    'enum_devolutionstatus'  => 'DAErp\Enum\DevolutionStatus',
                    'enum_discounttype'      => 'DAErp\Enum\DiscountType',
                    'enum_discrepancytype'   => 'DAErp\Enum\DiscrepancyType',
                    'enum_expensetype'   => 'DAErp\Enum\ExpenseType',
                    'enum_locationstatus'   => 'DAErp\Enum\LocationStatus',
                    'enum_ordertatus'        => 'DAErp\Enum\OrderStatus',
                    'enum_originsale'        => 'DAErp\Enum\OriginSale',
                    'enum_paymentmethod'     => 'DAErp\Enum\PaymentMethod',
                    'enum_paymentstatus'     => 'DAErp\Enum\PaymentStatus',
                    'enum_paymenttype'       => 'DAErp\Enum\PaymentType',
                    'enum_placedestination'  => 'DAErp\Enum\PlaceDestination',
                    'enum_productstatus'     => 'DAErp\Enum\ProductStatus',
                    'enum_promotionstatus'     => 'DAErp\Enum\PromotionStatus',
                    'enum_promotiontype'     => 'DAErp\Enum\PromotionType',
                    'enum_recruitmentstep'     => 'DAErp\Enum\RecruitmentStep',
                    'enum_reservationstatus' => 'DAErp\Enum\ReservationStatus',
                    'enum_shipperstatus'      => 'DAErp\Enum\ShipperStatus',
                    'enum_shippingtype'      => 'DAErp\Enum\ShippingType',
                    'enum_storetatus'        => 'DAErp\Enum\StoreStatus',
                    'enum_supplierstatus'    => 'DAErp\Enum\SupplierStatus',
                    'enum_timepunchreason'    => 'DAErp\Enum\TimePunchReason',
                    'enum_unittype'          => 'DAErp\Enum\UnitType',
                ],
            ],
        ],
        'entity_resolver' => [
            'orm_default' => [
                'resolvers' => [
                    // ::: Financial Resolvers :::
                    // --- Accounts ---
                    'DACore\IEntities\Erp\Financial\Accounts\BankInterface' => 'DAErp\Entity\Financial\Accounts\Bank',
                    'DACore\IEntities\Erp\Financial\Accounts\CreditInterface' => 'DAErp\Entity\Financial\Accounts\Credit',
                    'DACore\IEntities\Erp\Financial\Accounts\MoneyInterface' => 'DAErp\Entity\Financial\Accounts\Money',
                    // --- root ---
                    'DACore\IEntities\Erp\Financial\AccountSuperclassInterface' => 'DAErp\Entity\Financial\AccountSuperclass',
                    'DACore\IEntities\Erp\Financial\PaymentInterface'             => 'DAErp\Entity\Financial\Payment',
                    'DACore\IEntities\Erp\Financial\TaxInterface'             => 'DAErp\Entity\Financial\Tax',

                    // ::: Human Resource Resolvers :::
                    // --- Monitoring ---
                    'DACore\IEntities\Erp\HumanResource\Monitoring\EvaluationInterface' => 'DAErp\Entity\HumanResource\Monitoring\Evaluation',
                    'DACore\IEntities\Erp\HumanResource\Monitoring\EvaluationRatingInterface' => 'DAErp\Entity\HumanResource\Monitoring\EvaluationRating',
                    'DACore\IEntities\Erp\HumanResource\Monitoring\TimePunchClockInterfarce' => 'DAErp\Entity\HumanResource\Monitoring\TimePunchClock',
                    // --- Organization ---
                    'DACore\IEntities\Erp\HumanResource\Organization\BurdenInterface' => 'DAErp\Entity\HumanResource\Organization\Burden',
                    'DACore\IEntities\Erp\HumanResource\Organization\DepartmentInterface' => 'DAErp\Entity\HumanResource\Organization\Department',
                    'DACore\IEntities\Erp\HumanResource\Organization\OccupationInterface' => 'DAErp\Entity\HumanResource\Organization\Occupation',
                    // --- Partner ---
                    'DACore\IEntities\Erp\HumanResource\Partner\CopartnerInterface' => 'DAErp\Entity\HumanResource\Partner\Copartner',
                    'DACore\IEntities\Erp\HumanResource\Partner\EmployeeInterface' => 'DAErp\Entity\HumanResource\Partner\Employee',
                    // --- Recruitment ---
                    'DACore\IEntities\Erp\HumanResource\Recruitment\CandidateInterface' => 'DAErp\Entity\HumanResource\Recruitment\Candidate',
                    'DACore\IEntities\Erp\HumanResource\Recruitment\CurriculumInterface' => 'DAErp\Entity\HumanResource\Recruitment\Curriculum',
                    // --- Support ---
                    'DACore\IEntities\Erp\HumanResource\Support\SyndicateInterface' => 'DAErp\Entity\HumanResource\Support\Syndicate',
                    'DACore\IEntities\Erp\HumanResource\Support\TrainingInterface' => 'DAErp\Entity\HumanResource\Support\Training',
                    // --- Wage ---
                    'DACore\IEntities\Erp\HumanResource\Wage\BenefitInterface' => 'DAErp\Entity\HumanResource\Wage\Benefit',
                    'DACore\IEntities\Erp\HumanResource\Wage\SalaryInterface' => 'DAErp\Entity\HumanResource\Wage\Salary',
                    // --- root ---
                    'DACore\IEntities\Erp\HumanResource\PartnerSuperclassInterface' => 'DAErp\Entity\HumanResource\PartnerSuperclass',

                    // ::: Inventory Resolvers :::
                    // --- Parked ---
                    'DACore\IEntities\Erp\Inventory\Parked\DevolutionInterface'   => 'DAErp\Entity\Inventory\Parked\Devolution',
                    'DACore\IEntities\Erp\Inventory\Parked\DiscrepancyInterface'  => 'DAErp\Entity\Inventory\Parked\Discrepancy',
                    'DACore\IEntities\Erp\Inventory\Parked\LocationInterface'     => 'DAErp\Entity\Inventory\Parked\Location',
                    'DACore\IEntities\Erp\Inventory\Parked\ReservationInterface'  => 'DAErp\Entity\Inventory\Parked\Reservation',
                    // --- Warehouse ---
                    'DACore\IEntities\Erp\Inventory\Warehouse\PlaceInterface'     => 'DAErp\Entity\Inventory\Warehouse\Place',
                    'DACore\IEntities\Erp\Inventory\Warehouse\StorageInterface'   => 'DAErp\Entity\Inventory\Warehouse\Storage',
                    'DACore\IEntities\Erp\Inventory\Warehouse\WarehouseInterface' => 'DAErp\Entity\Inventory\Warehouse\Warehouse',

                    // ::: Manufacturer Resolvers :::
                    'DACore\IEntities\Erp\Manufacturer\ManufacturerInterface'     => 'DAErp\Entity\Manufacturer\Manufacturer',

                    // ::: My Business Resolvers :::
                    'DACore\IEntities\Erp\MyBusiness\MatrixInterface'     => 'DAErp\Entity\MyBusiness\Matrix',
                    'DACore\IEntities\Erp\MyBusiness\SubsidiaryInterface'     => 'DAErp\Entity\MyBusiness\Subsidiary',

                    // ::: Order Resolvers :::
                    // --- Expense ---
                    'DACore\IEntities\Erp\Order\Expense\ExpenseInterface' => 'DAErp\Entity\Order\Expense\Expense',
                    'DACore\IEntities\Erp\Order\Expense\ExpenseCateogoryInterface' => 'DAErp\Entity\Order\Expense\ExpenseCategory',
                    'DACore\IEntities\Erp\Order\Expense\OrderInterface' => 'DAErp\Entity\Order\Expense\Order',
                    // --- Production ---
                    'DACore\IEntities\Erp\Order\Production\OrderInterface' => 'DAErp\Entity\Order\Production\Order',
                    'DACore\IEntities\Erp\Order\Production\ProcessInterface' => 'DAErp\Entity\Order\Production\Process',
                    'DACore\IEntities\Erp\Order\Production\ProductProcessInterface' => 'DAErp\Entity\Order\Production\ProductProcess',
                    'DACore\IEntities\Erp\Order\Production\ProductionInterface' => 'DAErp\Entity\Order\Production\Production',
                    'DACore\IEntities\Erp\Order\Production\RawMaterialInterface' => 'DAErp\Entity\Order\Production\RawMaterial',
                    // --- Rental ---
                    'DACore\IEntities\Erp\Order\Rental\OrderInterface' => 'DAErp\Entity\Order\Rental\Order',
                    'DACore\IEntities\Erp\Order\Rental\RentalInterface' => 'DAErp\Entity\Order\Rental\Rental',
                    // --- Sale ---
                    'DACore\IEntities\Erp\Order\Sale\OrderInterface' => 'DAErp\Entity\Order\Sale\Order',
                    'DACore\IEntities\Erp\Order\Sale\SaleInterface' => 'DAErp\Entity\Order\Sale\Sale',
                    // --- Service ---
                    'DACore\IEntities\Erp\Order\Service\OrderInterface' => 'DAErp\Entity\Order\Service\Order',
                    'DACore\IEntities\Erp\Order\Service\ServiceInterface' => 'DAErp\Entity\Order\Service\Service',
                    // --- Store ---
                    'DACore\IEntities\Erp\Order\Store\OrderInterface'             => 'DAErp\Entity\Order\Store\Order',
                    'DACore\IEntities\Erp\Order\Store\StoreInterface'             => 'DAErp\Entity\Order\Store\Store',
                    // --- root ---
                    'DACore\IEntities\Erp\Order\OrderSuperclassInterface'         => 'DAErp\Entity\Order\OrderSuperclass',

                    // ::: Product Resolvers :::
                    'DACore\IEntities\Erp\Product\CategoryInterface'              => 'DAErp\Entity\Product\Category',
                    'DACore\IEntities\Erp\Product\DepartmentInterface'            => 'DAErp\Entity\Product\Department',
                    'DACore\IEntities\Erp\Product\FeatureInterface'               => 'DAErp\Entity\Product\Feature',
                    'DACore\IEntities\Erp\Product\GroupInterface'                 => 'DAErp\Entity\Product\Group',
                    'DACore\IEntities\Erp\Product\ProductInterface'               => 'DAErp\Entity\Product\Product',
                    'DACore\IEntities\Erp\Product\RatingInterface'                => 'DAErp\Entity\Product\Rating',

                    // ::: Promotion Resolvers :::
                    'DACore\IEntities\Erp\Promotion\CouponInterface'              => 'DAErp\Entity\Promotion\Coupon',
                    'DACore\IEntities\Erp\Promotion\MarketPromotionInterface'              => 'DAErp\Entity\Promotion\MarketPromotion',
                    'DACore\IEntities\Erp\Promotion\StorePromotionInterface'              => 'DAErp\Entity\Promotion\StorePromotion',

                    // ::: Service Resolvers :::
                    'DACore\IEntities\Erp\Service\ServiceInterface'              => 'DAErp\Entity\Service\Service',

                    // ::: Shipper Resolvers :::
                    'DACore\IEntities\Erp\Shipper\ShipperInterface'              => 'DAErp\Entity\Shipper\Shipper',
                    'DACore\IEntities\Erp\Shipper\TimelyRatingInterface'         => 'DAErp\Entity\Shipper\TimelyRating',

                    // ::: Supplier Resolvers :::
                    'DACore\IEntities\Erp\Supplier\SupplierInterface'             => 'DAErp\Entity\Supplier\Supplier',
                    'DACore\IEntities\Erp\Supplier\BudgetInterface'               => 'DAErp\Entity\Supplier\Budget',
                    'DACore\IEntities\Erp\Supplier\QualityRatingInterface'        => 'DAErp\Entity\Supplier\QualityRating',
                    'DACore\IEntities\Erp\Supplier\ProductBudgetInterface'        => 'DAErp\Entity\Supplier\ProductBudget',

                ],
            ],
        ],
    ],
];
