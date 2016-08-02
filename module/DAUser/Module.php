<?php
namespace DAUser;

use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\{ModuleRouteListener, MvcEvent};
use Zend\View\Model\JsonModel;

class Module 
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__=> __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}