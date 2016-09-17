<?php
namespace DAUser;

use \Zend\Mvc\Controller\ControllerManager;

return [
    'router' => [
        'routes' => [
            'dauser-users-rest' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/public/users[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => 'DAUser\Controller\UsersRest',
                    ],
                ],
            ],
            'dauser-user-login' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/public/login[/]',
                    'defaults' => [
                        'controller' => 'DAUser\Controller\UserLoginRest',
                    ],
                ],
            ],
            'dauser-user-activate' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/public/activate[/:id]',
                    'constraints' => [
                        'id' => '[a-zA-Z0-9_-]+',
                    ],
                    'defaults' => [
                        'controller' => 'DAUser\Controller\ActivateUserRest',
                    ],
                ],
            ]
        ],
    ],

    'controllers' => array(
        'factories' => array(
            'DAUser\Controller\ActivateUserRest' => function (ControllerManager $cm) {
                $sm = $cm->getServiceLocator();
                $service = $sm->get('DAUser\Service\User');

                $activateUser = new Controller\ActivateUserRestController($service);

                return $activateUser;
            }
        )
    ),

    'view_manager' => [
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],

    'entity_rest_service' => [
        'DAUser\Service\User' => [
            'class_name' => 'DAUser\Service\User',
            'entity' => 'DAUser\Entity\User'
        ]
    ],

    'service_rest_controller' => [
        'DAUser\Controller\UsersRest' => [
            'class_name' => 'DAUser\Controller\UserRestController',
            'service' => 'DAUser\Service\User'
        ],
        'DAUser\Controller\UserLoginRest' => [
            'class_name' => 'DAUser\Controller\UserLoginRestController',
            'service' => 'DAUser\Service\User'
        ]
    ],

    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity'),
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver',
                ],
            ],
        ],
        'entity_resolver' => [
            'orm_default' => [
                'resolvers' => [
                    'DACore\Entity\User\UserInterface' => 'DAUser\Entity\User',
                ],
            ],
        ],
    ],
    'data-fixture' => array(

        __NAMESPACE__ . '_fixture' => __DIR__ . '/../src/' . __NAMESPACE__ . '/Fixture',

    ),

    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
