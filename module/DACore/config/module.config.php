<?php
namespace DACore;

use Zend\Mvc\Router\Http\{Literal, Hostname};
use Zend\ServiceManager\Factory\InvokableFactory;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

use Zend\Session\SessionManager;
use Zend\Session\Container;

return [
    'router' => [
        'routes' => [
            'daapi-subdomain' => [
                'type' => Hostname::class,
                'options' => [
                    'route' => 'api.agenciadigitala.[:tail]',
                    'constraints' => [
                        'tail' => '[a-zA-Z._-]*',
                    ],
                ],
                'may_terminate' => false,
            ],
            'dabase-public-token-rest' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/api/public/public-token',
                    'defaults' => [
                        'controller' => Controller\PublicTokenRestController::class,
                    ],
                ],
            ],
            'dabase-csrf-form-rest' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/api/public/csrf-form',
                    'defaults' => [
                        'controller' => Controller\CsrfFormRestController::class,
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
            'DACore\Mail\MailService' => 'DACore\Mail\Factory\MailServiceFactory',
            'DACore\Permissions\Acl' => function ($sm)
            {
                $em = $sm->get('Doctrine\ORM\EntityManager');

                $repoRoles = $em->getRepository('DAAcl\Entity\Role');
                $repoResources = $em->getRepository('DAAcl\Entity\Resource');
                $repoPrivilege = $em->getRepository('DAAcl\Entity\Privilege');

                return new Permissions\Acl($repoRoles->findAll(), $repoResources->findAll(), $repoPrivilege->findAll());
            },
            /*'Zend\Session\SessionManager' => function ($sm) {
                $config = $sm->get('config');
                if (isset($config['session'])) {
                    $session = $config['session'];

                    $sessionConfig = null;
                    if (isset($session['config'])) {
                        $class = isset($session['config']['class'])  ? $session['config']['class'] : 'Zend\Session\Config\SessionConfig';
                        $options = isset($session['config']['options']) ? $session['config']['options'] : array();
                        $sessionConfig = new $class();
                        $sessionConfig->setOptions($options);
                    }

                    $sessionStorage = null;
                    if (isset($session['storage'])) {
                        $class = $session['storage'];
                        $sessionStorage = new $class();
                    }

                    $sessionSaveHandler = null;
                    if (isset($session['save_handler'])) {
                        // class should be fetched from service manager since it will require constructor arguments
                        $sessionSaveHandler = $sm->get($session['save_handler']);
                    }

                    $sessionManager = new SessionManager($sessionConfig, $sessionStorage, $sessionSaveHandler);
                } else {
                    $sessionManager = new SessionManager();
                }
                Container::setDefaultManager($sessionManager);
                return $sessionManager;
            },*/
        ],
        'abstract_factories' => [
            'DACore\Factory\AbsctractRestServiceFactory',
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
        ]
    ],

    'controllers' => [
        'factories' => [
            Controller\PublicTokenRestController::class => InvokableFactory::class,
            Controller\CsrfFormRestController::class => InvokableFactory::class,
        ],
        'abstract_factories' => [
            'DACore\Factory\AbsctractRestControllerFactory',
        ],
        'initializers' => [
            function ($instance, $cm) {
                $sm   = $cm->getServiceLocator();
                if ($instance instanceof \DACore\Controller\Aware\ApcCacheAwareInterface) {
                    $cache = $sm->get('apc');
                    $instance->getCache($cache);
                }

                if ($instance instanceof \DACore\Controller\Aware\MemcachedCacheAwareInterface) {
                    $cache = $sm->get('memcached');
                    $instance->getCache($cache);
                }

                if ($instance instanceof \DACore\Controller\Aware\FirephpAwareInterface) {
                    $log = new Logger('DA_FirePHP_Logger');
                    $log->pushHandler(new FirePHPHandler());

                    $instance->getFirephp($log);
                }
            }
        ]
    ],

];