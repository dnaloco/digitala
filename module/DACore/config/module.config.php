<?php
namespace DACore;

use Zend\Mvc\Router\Http\Literal;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'dabase-public-token-rest' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/api/public/public-token',
                    'defaults' => [
                        'controller' => Controller\PublicTokenRestController::class,
                    ],
                ],
            ],
        ],
    ],
    'doctrine' => [
        'configuration' => [
            'orm_default' => [
                'types' => [
                    'enum_addresstype'      => 'DACore\Enum\AddressType',
                    'enum_companytype'      => 'DACore\Enum\CompanyType',
                    'enum_gendertype'       => 'DACore\Enum\GenderType',
                    'enum_imagefiletype'    => 'DACore\Enum\ImageFiletype',
                    'enum_licence'          => 'DACore\Enum\Licence',
                    'enum_mobileoperator'   => 'DACore\Enum\MobileOperator',
                    'enum_socialtype'       => 'DACore\Enum\SocialType',
                    'enum_telephonetype'    => 'DACore\Enum\TelephoneType',
                    'enum_documenttype'     => 'DACore\Enum\DocumentType',
                ]
            ]
        ]
    ],
    'view_manager' => [
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],

    'service_manager' => [
        'factories' => [
            'DACore\Mail\MailService' => 'DACore\Mail\Factory\MailServiceFactory'
        ],
        'abstract_factories' => [
            'DACore\Factory\AbsctractRestServiceFactory',
        ]
    ],

    'controllers' => [
        'factories' => [
            Controller\PublicTokenRestController::class => InvokableFactory::class,
        ],
        'abstract_factories' => [
            'DACore\Factory\AbsctractRestControllerFactory',
        ],
    ],

];