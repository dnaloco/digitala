<?php
namespace DACore;

use Zend\Mvc\Router\Http\{
    Literal,
    Hostname,
    Segment
};
use Zend\ServiceManager\Factory\InvokableFactory;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

use Zend\Session\SessionManager;
use Zend\Session\Container;
use Zend\Mvc\Controller\ControllerManager;


return [
    'router' => [
        'routes' => [
            
            'dacore-preupload-rest' => [
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

    'view_manager' => [
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
    'service_manager' => [
        'services' => [
            'MyUploadService' => new Service\MyUpload(),
        ],
        'initializers' => [
            function ($service, $sm) {
                if(!$service instanceof Upload\MyUploadAwareInterface) {
                    return;
                }

                $service->setUploadManager($sm->get('MyUploadService'));
            }
        ],
        'factories' => [
            'DACore\Mail\MailService' => 'DACore\Mail\Factory\MailServiceFactory',
            'DACore\Permissions\Acl' => function ($sm)
            {
                $em = $sm->get('Doctrine\ORM\EntityManager');

                $repoRoles = $em->getRepository('DACore\IEntities\Acl\RoleInterface');
                $repoResources = $em->getRepository('DACore\IEntities\Acl\ResourceInterface');
                $repoPrivilege = $em->getRepository('DACore\IEntities\Acl\PrivilegeInterface');

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
            'PreUploadRest' => function (ControllerManager $cm) {
                $sm = $cm->getServiceLocator();
                $myUploadService = $sm->get('MyUploadService');

                $controller = new Controller\PreUploadRestController($myUploadService);

                return $controller;
            },
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