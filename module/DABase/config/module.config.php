<?php
namespace DABase;

use Zend\Mvc\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Mvc\Controller\ControllerManager;
use Zend\ServiceManager\ServiceManager;

return [
    'router' => [
        'routes' => [
            'dabase-preupload-rest' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/api/public/preupload[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' =>  'PreUploadRest',
                    ],
                ],
            ],
            'dabase-cities-rest' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/:access/cities[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                        'access' => 'private|public'
                    ],
                    'defaults' => [
                        'controller' => 'DABase\Controller\CitiesRest',
                    ],
                ],
            ],
            'dabase-states-rest' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/:access/states[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                        'access' => 'private|public'
                    ],
                    'defaults' => [
                        'controller' => 'DABase\Controller\StatesRest',
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
    'entity_rest_service' => [
        'DABase\Service\City' => [
            'class_name' => 'DABase\Service\City',
            'entity' => 'DABase\Entity\City'
        ],
        'DABase\Service\State' => [
            'class_name' => 'DABase\Service\State',
            'entity' => 'DABase\Entity\State'
        ]
    ],

    'service_rest_controller' => [
        'DABase\Controller\CitiesRest' => [
            'class_name' => 'DABase\Controller\CitiesRestController',
            'service' => 'DABase\Service\City'
        ],
        'DABase\Controller\StatesRest' => [
            'class_name' => 'DABase\Controller\StatesRestController',
            'service' => 'DABase\Service\State'
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
