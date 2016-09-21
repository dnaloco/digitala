<?php
namespace DAErp;

use Zend\Mvc\Router\Http\{Hostname, Literal, Segment};
use Zend\ServiceManager\Factory\InvokableFactory;
//echo file_exists(__DIR__ . '/key.pem');
return [
    'router' => [
        'routes' => [
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
    'view_manager' => [
        'template_map' => [
            'layout/erp' => __DIR__ . '/../view/layout/layout.erp.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
