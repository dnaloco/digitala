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
/*	private $mail;

	public function __construct(\DACore\Service\Mail\MailServiceInterface $mail)
	{
		$this->mail = $mail;
	}
*/
	// protected $events;


    public function indexAction()
    {
    	//var_dump($this->mail);die();
    	// $this->mail->setPage('teste')
    	// 	->setSubject('Email de teste')
		//        ->setTo('arthur_scosta@yahoo.com.br')
		//        ->setData(array())
		//        ->prepare()
		//        ->send();
		$params = compact('foo', 'baz');
        $this->getEventManager()->trigger(__FUNCTION__, $this, $params);
        return new ViewModel();
    }

}
