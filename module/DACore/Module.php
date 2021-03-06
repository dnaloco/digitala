<?php
namespace DACore;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\View\Model\JsonModel;

use Zend\Session\Config\SessionConfig;
use Zend\Session\Container;
use Zend\Session\SessionManager;

use Zend\Uri\UriFactory;

class Module
{

    public function onBootstrap(MvcEvent $e)
    {
        UriFactory::registerScheme('chrome-extension', 'Zend\Uri\Uri');

        $sm = $e->getApplication()->getServiceManager();
        $em = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($em);


        $sharedEvents = $em->getSharedManager();
        $entityManager = $sm->get('Doctrine\ORM\EntityManager');
        $cache = $sm->get('apc');
        $acl = $sm->get('DACore\Permissions\Acl');
        $tokenAuth = new \DACore\Auth\JwtTokenDispatcherAuthentication($entityManager, $cache, $acl);

        $sharedEvents->attach('Zend\Mvc\Controller\AbstractRestfulController', MvcEvent::EVENT_DISPATCH, array($tokenAuth, 'onDispatch'), 200);


    }



/*
    public function initSession($config)
    {
        $sessionConfig = new SessionConfig();
        $sessionConfig->setOptions($config);
        $sessionManager = new SessionManager($sessionConfig);
        $sessionManager->start();
        Container::setDefaultManager($sessionManager);
    }*/

    /*public function bootstrapSession($e)
    {
        $session = $e->getApplication()
                     ->getServiceManager()
                     ->get('Zend\Session\SessionManager');
        $session->start();

        $container = new Container('initialized');
        if (!isset($container->init)) {
            $serviceManager = $e->getApplication()->getServiceManager();
            $request        = $serviceManager->get('Request');

            $session->regenerateId(true);
            $container->init          = 1;
            $container->remoteAddr    = $request->getServer()->get('REMOTE_ADDR');
            $container->httpUserAgent = $request->getServer()->get('HTTP_USER_AGENT');

            $config = $serviceManager->get('Config');
            if (!isset($config['session'])) {
                return;
            }

            $sessionConfig = $config['session'];
            if (isset($sessionConfig['validators'])) {
                $chain   = $session->getValidatorChain();

                foreach ($sessionConfig['validators'] as $validator) {
                    switch ($validator) {
                        case 'Zend\Session\Validator\HttpUserAgent':
                            $validator = new $validator($container->httpUserAgent);
                            break;
                        case 'Zend\Session\Validator\RemoteAddr':
                            $validator  = new $validator($container->remoteAddr);
                            break;
                        default:
                            $validator = new $validator();
                    }

                    $chain->attach('session.validate', array($validator, 'isValid'));
                }
            }
        }
    }*/

    public function compressOutput($e)
    {
        $response = $e->getResponse();
        $content = $response->getBody();
        $content = str_replace("  ", " ", str_replace("\n", " ", str_replace("\r", " ", str_replace("\t", " ", $content))));

        if (@strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== false) {
            header('Content-Encoding: gzip');
            $content = gzencode($content, 9);
        }

        $response->setContent($content);
    }

    public function onDispatchError($e)
    {
        return $this->getJsonModelError($e);
    }

    public function onRenderError($e)
    {
        return $this->getJsonModelError($e);
    }

    public function getJsonModelError($e)
    {
        $error = $e->getError();
        if (!$error) {
            return;
        }
        $response = $e->getResponse();
        $exception = $e->getParam('exception');
        $exceptionJson = array();
        if ($exception) {
            $exceptionJson = array(
                'class' => get_class($exception),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'message' => $exception->getMessage(),
                'stacktrace' => $exception->getTraceAsString(),
            );
        }
        $errorJson = array(
            'message' => 'An error occurred during execution; please try again later.',
            'error' => $error,
            'exception' => $exceptionJson,
        );
        if ($error == 'error-router-no-match') {
            $errorJson['message'] = 'Resource not found.';
        }
        $model = new JsonModel(array('errors' => array($errorJson)));
        $e->setResult($model);
        return $model;
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__=> __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}


/*    public function onDispatch(\Zend\Mvc\MvcEvent $e){
        // ... your logic here ...
        var_dump('LOGICA PARA VALIDAR TOKENS JWT...');
        echo '<br>';
        echo get_class($e->getApplication());
        echo '<br>';
        $matches =  $e->getRouteMatch();
        $response = $e->getResponse();
        $request =  $e->getRequest();
        $method =   $request->getMethod();
        die;
    }*/
/*$em->attach(MvcEvent::EVENT_DISPATCH, function($e) {
    echo $e->getRouteMatch()->getMatchedRouteName();
}, 100);*/

//$sharedEvents = $em->getSharedManager();
//$tokenAuth = new \DACore\Auth\TokenDispatcherAuthentication();

//$sharedEvents->attach('DACore\Service\AbstractCrudRestController', MvcEvent::EVENT_DISPATCH, array($tokenAuth, 'onDispatch'), 200);
//$em->attach(\Zend\Mvc\MvcEvent::EVENT_DISPATCH, array($this, 'onDispatch'));
//$this->bootstrapSession($e);

/*$em->attach("finish", array($this, "compressOutput"), 100);

if (strpos($_SERVER['REQUEST_URI'], '/api/') !== false) {
    $em->attach(MvcEvent::EVENT_DISPATCH_ERROR, array($this, 'onDispatchError'), 0);
    $em->attach(MvcEvent::EVENT_RENDER_ERROR, array($this, 'onRenderError'), 0);
}*/
/*$this->initSession(array(
    'remember_me_seconds' => 180,
    'use_cookies' => true,
    'name' => 'ADA_SESSION',
    'cookie_domain' => '.agenciadigitala.local',
    //'cookie_httponly' => true,
));*/