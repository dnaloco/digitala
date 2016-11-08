<?php
namespace DAFamilyBudget;

use Zend\ModuleManager\ModuleManager;

class Module
{
    public function init(ModuleManager $mm)
    {

        $mm->getEventManager()->getSharedManager()->attach(__NAMESPACE__,
            'dispatch', function ($e) {
                $e->getTarget()->layout('layout/family-budget');
            });

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
