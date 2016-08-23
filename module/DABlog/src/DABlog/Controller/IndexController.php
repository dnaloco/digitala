<?php
namespace DABlog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Tweet\Service\TweetService;

//use DADummy\DesignPatterns\Prototype\{MyCloneable, SubObject};

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
    	//$tweet = new TweetService();
    	//$tweet->sendTweet('HELLO<br/>');
     //    echo '<br/>';
    	// die('OK');
    	/*$teste= $this->getServiceLocator()->get('MyOAuth2Provider')
            ->handleTokenRequest()
            ->makeHttpResponse();*/
        return new ViewModel();
    }

}
