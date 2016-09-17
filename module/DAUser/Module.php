<?php
namespace DAUser;

use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $event) {
        $sm = $event->getApplication()->getServiceManager();
        $eventManager = $event->getApplication()->getEventManager();
        $mailService = $sm->get('DACore\Mail\MailService');
        $eventManager->attach(new Listener\ConfirmationListener($mailService));

        //$sharedEvents = $eventManager->getSharedManager();
        //$sharedEvents->attach('DAUser\Controller\UserRestController', 'cls', array(new \DAUser\Controller\Class2, 'listen'));
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
