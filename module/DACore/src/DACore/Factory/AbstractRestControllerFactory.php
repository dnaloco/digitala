<?php
namespace DACore\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\AbstractFactoryInterface;

class AbsctractRestControllerFactory implements AbstractFactoryInterface
{
    const CLASS_NOT_DEFINED = '\'service_rest_controller\' array has no \'class_name\' child element defined';
	const SERVICE_DEFINED = '\'service_rest_controller\' array has no \'service\' child element defined';

    protected $config;

    public function getConfig(ServiceLocatorInterface $serviceLocator) {
        if (! isset($this->config)) {
            $config = $serviceLocator->get('Config');
            $this->config = $config['service_rest_controller'];
        }
        return $this->config;
    }

    public function canCreateServiceWithName(ServiceLocatorInterface $pluginManager, $name, $requestedName)
    {


        $sm = $pluginManager->getServiceLocator();
        $config = $this->getConfig($sm);

        return (isset($config[$requestedName])) ? true : false;
    }

    public function createServiceWithName(ServiceLocatorInterface $pluginManager, $name, $requestedName)
    {
        $sm = $pluginManager->getServiceLocator();

        $config = $this->getConfig($sm);
        $config = $config[$requestedName];

        if (!isset($config['class_name'])) {
        	throw new \Exception(self::CLASS_NOT_DEFINED);
        }

        if (!isset($config['service'])) {
        	throw new \Exception(self::SERVICE_DEFINED);
        }

        $className = $config['class_name'];
        $service = $sm->get($config['service']);

        return new $className($service);
    }
} 