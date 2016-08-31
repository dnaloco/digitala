<?php
namespace DABase;

use Zend\Mvc\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Mvc\Controller\ControllerManager;
use Zend\ServiceManager\ServiceManager;

return [
    'router' => [
        'routes' => [
            'dadbase-preupload-rest' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/api/preupload[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' =>  'PreUploadRest',
                    ],
                ],
            ],
        ],
    ],
    'service_manager' => [
        'services' => [
            'MyUploadService' => new Service\MyUpload(),
        ],
        'initializers' => [
            function ($service, $sm) {
                if(!$service instanceof \DACore\Upload\MyUploadAwareInterface) {
                    return;
                }

                $service->setUploadManager($sm->get('MyUploadService'));
            }
        ]
    ],
     'controllers' => [
        'factories' => [
            'PreUploadRest' => function (ControllerManager $cm) {
                $sm = $cm->getServiceLocator();
                $myUploadService = $sm->get('MyUploadService');

                $controller = new Controller\PreUploadRestController($myUploadService);

                return $controller;
            },
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
                    'DACore\Entity\Base\AddressInterface'           => 'DABase\Entity\Address',
                    'DACore\Entity\Base\CityInterface'              => 'DABase\Entity\City',
                    'DACore\Entity\Base\CompanyInterface'           => 'DABase\Entity\Company',
                    'DACore\Entity\Base\CompanyCategoryInterface'   => 'DABase\Entity\CompanyCategory',
                    'DACore\Entity\Base\CountryInterface'           => 'DABase\Entity\Country',
                    'DACore\Entity\Base\CurrencyInterface'          => 'DABase\Entity\Currency',
                    'DACore\Entity\Base\DocumentInterface'          => 'DABase\Entity\Document',
                    'DACore\Entity\Base\EmailInterface'             => 'DABase\Entity\Email',
                    'DACore\Entity\Base\FileInterface'              => 'DABase\Entity\File',
                    'DACore\Entity\Base\GoodTagInterface'           => 'DABase\Entity\GoodTag',
                    'DACore\Entity\Base\ImageInterface'             => 'DABase\Entity\Image',
                    'DACore\Entity\Base\PersonInterface'            => 'DABase\Entity\Person',
                    'DACore\Entity\Base\SocialNetworkInterface'     => 'DABase\Entity\SocialNetwork',
                    'DACore\Entity\Base\StateInterface'             => 'DABase\Entity\State',
                    'DACore\Entity\Base\TelephoneInterface'         => 'DABase\Entity\Telephone',
                    'DACore\Entity\Base\VideoInterface'             => 'DABase\Entity\Video',

                ],
            ],
        ],
    ],

    'data-fixture' => array(

        __NAMESPACE__ . '_fixture' => __DIR__ . '/../src/' . __NAMESPACE__ . '/Fixture',

    ),
];
