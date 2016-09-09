<?php
namespace DASite;

use Zend\ModuleManager\ModuleManager;

class Module
{
    public function init(ModuleManager $mm)
    {

        $mm->getEventManager()->getSharedManager()->attach(__NAMESPACE__,
            'dispatch', function ($e) {
                $e->getTarget()->layout('layout/site');
            });

        // make a trigger when the user was created
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

/*    public function getControllerConfig()
    {
        return array(
             'initializers' => array(
                function ($instance, $sm) {
                    var_dump($instance::getServiceName());
                    $instance->setService('ADASDADASD');
                    var_dump($instance->getService());
                    die();
                    if ($instance instanceof ConfigAwareInterface) {
                        $locator = $sm->getServiceLocator();
                        $config  = $locator->get('Config');
                        $instance->setConfig($config['application']);
                    }
                }
            )
        );
    }*/
}
