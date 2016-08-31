<?php
namespace DAAuth\Authentication;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\Storage\Session;
use Zend\Authentication\AuthenticationService;

class AuthenticationFactory implements FactoryInterface
{
	/**
	 * Create service
	 *
	 * @param   $serviceLocator ServiceLocatorInterface
	 *
	 * @return mixed
	 */
	public function createService(ServiceLocatorInterface $serviiceLocator)
	{
		$em = $serviceLocator->get('Doctrine\ORM\EntityManager');
		return AuthenticationService(new Session(), new Adapter($em));
	}
}