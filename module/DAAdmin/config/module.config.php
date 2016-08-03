<?php 

namespace DAAdmin;

use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Mvc\Router\Http\{Literal, Segment, Hostname};

return [
    'router' => [
        'routes' => [
            'daadmin-home' => array(
                'type'    => Hostname::class,
                'options' => array(
                    'route'    => 'admin.digitala.local',
                    'constraints' => array(

                    ),
                    'defaults' => array(
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,

/*                'child_routes' => array(
                    'login' => array(
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => array(
                            'route'    => '/login',
                            'defaults' => array(
                                'action'     => 'login',
                            ),
                        ),
                    ),
                    'createAd' => array(
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => array(
                            'route'    => '/createAd',
                            'defaults' => array(
                                'action'     => 'createAd',
                            ),
                        ),
                    ),


                ),*/
            )
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
