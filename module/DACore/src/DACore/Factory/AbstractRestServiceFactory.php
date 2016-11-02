<?php
namespace DACore\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\AbstractFactoryInterface;

class AbsctractRestServiceFactory implements AbstractFactoryInterface
{
	const CLASS_NOT_DEFINED = 'entity_rest_service array has no class_name child element defined';
	const ENTITY_DEFINED = 'entity_rest_service array has no entity child element defined';

    protected $config;
    protected $entityManager;

    public function getConfig(ServiceLocatorInterface $serviceLocator) {
        if (! isset($this->config)) {
            $config = $serviceLocator->get('Config');
            $this->config = $config['entity_rest_service'];
        }
        return $this->config;
    }

    public function getEntityManager(ServiceLocatorInterface $serviceLocator) {
        if (!isset($this->entityManager)) {
            $this->entityManager = $serviceLocator->get('Doctrine\ORM\EntityManager');
        }
        return $this->entityManager;
    }

    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        $config = $this->getConfig($serviceLocator);

        return (isset($config[$requestedName])) ? true : false;
    }

    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        $config = $this->getConfig($serviceLocator);
        $config = $config[$requestedName];

        if (!isset($config['class_name'])) {
        	throw new \Exception(self::CLASS_NOT_DEFINED);
        }

        if (!isset($config['entity'])) {
        	throw new \Exception(self::ENTITY_DEFINED);
        }

        //var_dump($config['class_name']);die;
        $className = $config['class_name'];

        $entityManager = $this->getEntityManager($serviceLocator);
        $entity = $config['entity'];

        return new $className($entityManager, $entity);
    }
} 