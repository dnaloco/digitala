<?php 

namespace DAAdmin;

use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Mvc\Router\Http\{Literal, Segment, Hostname};

return [
    'router' => [
        'routes' => [
            'daadmin-subdomain' => array(
                'type' => Hostname::class,
                'options' => array(
                    'route' => 'admin.agenciadigitala.[:tail]',
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
            'layout/admin01'                 => __DIR__ . '/../view/layout/layout.admin01.phtml',
            'layout/admin01development'      => __DIR__ . '/../view/layout/layout.admin01.dev.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ]
    ],
];
