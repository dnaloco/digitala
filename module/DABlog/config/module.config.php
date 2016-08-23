<?php
namespace DABlog;

use Zend\Mvc\Router\Http\Hostname;
use Zend\Mvc\Router\Http\Segment;use Zend\ServiceManager\Factory\InvokableFactory;
//echo file_exists(__DIR__ . '/key.pem');
return [
    'router' => [
        'routes' => [
            'dablog-subdomain' => array(
                'type' => Hostname::class,
                'options' => array(
                    'route' => 'blog.agenciadigitala.[:tail]',
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

    'service_manager' => [
        'factories' => [
            //Register the factory with whatever service name you like
            'MyOAuth2Provider' => 'Codeacious\OAuth2Provider\ProviderFactory',
        ],
    ],

    'oauth2provider' => [
        'storage' => [
            'public_key' => [
                'class' => 'Codeacious\OAuth2Provider\Storage\PublicKeyFileStore',
                'options' => [
                    'public_key' => __DIR__ . '/key.pem',
                    'algorithm' => 'RS256',
                ],
            ],
        ],
        'options' => [
            'use_jwt_access_tokens'  => true,
            'www_realm' => 'My Application',
        ],
    ],
];
