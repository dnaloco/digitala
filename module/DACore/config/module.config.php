<?php
namespace DACore;

return [
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
                    'enum_socialtype'       => 'DACore\Enum\AddressType',
                    'enum_telephonetype'    => 'DACore\Enum\TelephoneType',
                ]
            ]
        ]
    ],

    'service_manager' => [
        'factories' => [
            'DACore\Mail\MailService' => 'DACore\Mail\Factory\MailServiceFactory'
        ],
        'abstract_factories' => [
            'DACore\Factory\AbsctractRestServiceFactory',
        ],
    ],

    'controllers' => [
        'abstract_factories' => [
            'DACore\Factory\AbsctractRestControllerFactory',
        ],
    ],

];