<?php
namespace DABase;

use Zend\Mvc\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

use Zend\ServiceManager\ServiceManager;

return [
    'router' => [
        'routes' => [

            'dabase-company-categories-rest' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/api/private/company-categories[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' =>  'DABase\Controller\CompanyCategoriesRest',
                    ],
                ],
            ],
            'dabase-people-rest' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/api/private/people[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' =>  'DABase\Controller\GoodTagsRest',
                    ],
                ],
            ],
            'dabase-good-tags-rest' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/api/private/good-tags[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' =>  'DABase\Controller\GoodTagsRest',
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
    'entity_rest_service' => [
        'DABase\Service\City' => [
            'class_name' => 'DABase\Service\City',
            'entity' => 'DABase\Entity\City'
        ],
        'DABase\Service\State' => [
            'class_name' => 'DABase\Service\State',
            'entity' => 'DABase\Entity\State'
        ],
        'DABase\Service\CompanyCategory' => [
            'class_name' => 'DABase\Service\CompanyCategory',
            'entity' => 'DABase\Entity\CompanyCategory'
        ],
        'DABase\Service\GoodTag' => [
            'class_name' => 'DABase\Service\GoodTag',
            'entity' => 'DABase\Entity\GoodTag'
        ],
        'DABase\Service\Person' => [
            'class_name' => 'DABase\Service\Person',
            'entity' => 'DABase\Entity\Person'
        ],
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
        'DABase\Controller\CompanyCategoriesRest' => [
            'class_name' => 'DABase\Controller\CompanyCategoriesRestController',
            'service' => 'DABase\Service\CompanyCategory'
        ],
        'DABase\Controller\GoodTagsRest' => [
            'class_name' => 'DABase\Controller\GoodTagsRestController',
            'service' => 'DABase\Service\GoodTag'
        ],
        'DABase\Controller\GoodTagsRest' => [
            'class_name' => 'DABase\Controller\GoodTagsRestController',
            'service' => 'DABase\Service\Person'
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
