<?php
namespace DAAcl;

use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Mvc\Router\Http\{Literal, Segment, Hostname};

return [
	'view_manager' => [
		'strategies' => [
			'ViewJsonStrategy'
		]
	],

	'doctrine' => [
		'driver' => [
			__NAMESPACE__ . '_driver' => [
				'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
				'cache' => 'array',
				'paths' => array(__DIR__ . '/../src/'. __NAMESPACE__ . '/Entity'),
			],
			'orm_default' => [
				'drivers' => [
					__NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
				]
			]
		],
		'entity_resolver' => [
            'orm_default' => [
                'resolvers' => [
                    'DACore\IEntities\Acl\RoleInterface' 		=> 'DAAcl\Entity\Role',
                    'DACore\IEntities\Acl\ResourceInterface' 	=> 'DAAcl\Entity\Resource',
                    'DACore\IEntities\Acl\PrivilegeInterface' 	=> 'DAAcl\Entity\Privilege',
                ],
            ],
        ],
	],

	'data-fixture' => array(

        __NAMESPACE__ . '_fixture' => __DIR__ . '/../src/' . __NAMESPACE__ . '/Fixture',

    ),
];