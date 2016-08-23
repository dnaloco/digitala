<?php
namespace DASite\Controller\Factory;

use DASite\Controller\IndexController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IndexFactoryController implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /**
         * @var ServiceLocatorInterface $serviceLocator
         */
        // $sm = $serviceLocator->getServiceLocator();
        // $mail = $sm->get('DACore\Mail\MailService');

        return new IndexController();
    }

}