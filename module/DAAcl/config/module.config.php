<?php
namespace DAAcl;

use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Mvc\Router\Http\{Literal, Segment, Hostname};

return [
/*	'router' => [
		'routes' => [
			'daacl-roles-rest' => [
				'type' => 'Segment',
				'options' => [
					'route' => '/api/roles[/:roleId]',
					'constraints' => [
						'roleId' => '[0-9]+',
					],
					'defaults' => [
						'controller' => 'DAUser\Controller\UsersRest',
					]
				]
			]
		]
	],
*/
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
                    'DACore\Entity\Acl\RoleInterface' 		=> 'DAAcl\Entity\Role',
                    'DACore\Entity\Acl\ResourceInterface' 	=> 'DAAcl\Entity\Resource',
                    'DACore\Entity\Acl\PrivilegeInterface' 	=> 'DAAcl\Entity\Privilege',
                ],
            ],
        ],
	]
];