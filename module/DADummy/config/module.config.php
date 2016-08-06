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

];
