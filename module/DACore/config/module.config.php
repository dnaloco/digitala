<?php
namespace DACore;

return [
    'doctrine' => [
        'configuration' => [
            'orm_default' => [
                'types' => [
                    'enum_testtype'         => 'DACore\Enum\TestType',
                    'enum_addresstype'      => 'DACore\Enum\AddressType',
                    'enum_imagefiletype'    => 'DACore\Enum\ImageFiletype',
                    'enum_socialtype'       => 'DACore\Enum\AddressType',
                    'enum_gendertype'       => 'DACore\Enum\GenderType',
                ]
            ]
        ]
    ],

    'service_manager' => [
        'factories' => [
            'DACore\Mail\MailService' => 'DACore\Mail\Factory\MailServiceFactory'
        ]
    ]

];