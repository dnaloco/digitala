<?php
namespace DASite\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Tweet\Service\TweetService;

use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;

class IndexController extends AbstractActionController
{

    public function indexAction()
    {
    	//var_dump($this->mail);die();
    	// $this->mail->setPage('teste')
    	// 	->setSubject('Email de teste')
		//        ->setTo('arthur_scosta@yahoo.com.br')
		//        ->setData(array())
		//        ->prepare()
		//        ->send();
    	//$this->setConfirmationData(array('nome' => 'Arthur Santos Costa', 'activationKey' => 'ahusud9q2h8193h1928dsadh912h3912'));

        return new ViewModel();
    }

}
