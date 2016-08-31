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
        return new ViewModel();
    }

}
