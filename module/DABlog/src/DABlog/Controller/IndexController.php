<?php
namespace DABlog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

//use DADummy\DesignPatterns\Prototype\{MyCloneable, SubObject};

class IndexController extends AbstractActionController
{
    public function indexAction()
    {

        return new ViewModel();
    }

}
