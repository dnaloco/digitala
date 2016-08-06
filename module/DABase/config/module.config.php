<?php
namespace DABase;

use Zend\Mvc\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'dadbase-people-rest' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/api/people[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => [
                        'controller' => 'DABase\Controller\PeopleRest',
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
                    'DABase\Entity\PersonInterface' => 'DABase\Entity\Person',
                    'DABase\Entity\ImageInterface' => 'DABase\Entity\Image',
                ],
            ],
        ],
    ],
];
