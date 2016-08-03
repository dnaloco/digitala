<?php

namespace DABlog;

use Zend\Mvc\Router\Http\Hostname;
use Zend\Mvc\Router\Http\Literal;
use Zend\Mvc\Router\Http\Segment;use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'dablog-home' => array(
                'type' => Hostname::class,
                'options' => array(
                    'route' => 'www.agenciadigitala.com.br',
                    'defaults' => array(
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ),
                ),
            ),
            'dablog-landing-page' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/teste-landing',
                    'defaults' => array(g
                        'controller' => Controller\IndexController::class,
                        'action' => 'landingPage',
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
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/blog01' => __DIR__ . '/../view/layout/layout.blog.phtml',
            'layout/landingTest' => __DIR__ . '/../view/layout/layout.landing.phtml',

            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
