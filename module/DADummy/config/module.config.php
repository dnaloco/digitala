<?php

namespace DADummy;

use Zend\Mvc\Router\Http\Literal;
use Zend\Mvc\Router\Http\Segment;use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'dadummy-home' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/dummy',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'dadummy-blog' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/dummy/blog/post[/:postId]',
                    'defaults' => [
                        'controller' => Blog\Controller\BlogController::class,
                        'action' => 'post',
                        'postId' => '\d+',
                    ],
                ],
            ],
            'dadummy-test-rest' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/api/test[/:testId]',
                    'constraints' => array(
                        'testId' => '[0-9]+',
                    ),
                    'defaults' => [
                        'controller' => Controller\TestRestController::class,
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\TestRestController::class => InvokableFactory::class,
            //Blog\Controller\BlogController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ],

];
