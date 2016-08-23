<?php
namespace DASite\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Tweet\Service\TweetService;

class IndexController extends AbstractActionController
{
/*	private $mail;

	public function __construct(\DACore\Service\Mail\MailServiceInterface $mail)
	{
		$this->mail = $mail;
	}
*/
    public function indexAction()
    {
    	//var_dump($this->mail);die();
    	// $this->mail->setPage('teste')
    	// 	->setSubject('Email de teste')
		//        ->setTo('arthur_scosta@yahoo.com.br')
		//        ->setData(array())
		//        ->prepare()
		//        ->send();
        return new ViewModel();
    }

}
