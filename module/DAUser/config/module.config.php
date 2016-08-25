<?php
namespace DAUser;

return [
    'router' => [
        'routes' => [
            'dauser-users-rest' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/users[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => 'DAUser\Controller\UsersRest',
                    ],
                ],
            ],
        ],
    ],

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
];
