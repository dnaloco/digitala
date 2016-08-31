<?php
namespace DACore\Mail\Factory;

use DACore\Mail\MailService;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;


class MailServiceFactory implements FactoryInterface
{
	public function createService(ServiceLocatorInterface $serviceLocator)
	{

		$config = $serviceLocator->get('Config');

		$transport = new SmtpTransport();
		$options = new SmtpOptions($config['mail']);
		$transport->setOptions($options);

		$view = $serviceLocator->get('View');

		return new MailService($transport, $view);
	}
}