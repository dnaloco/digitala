<?php
namespace DABlog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
//use DADummy\DesignPatterns\Prototype\{MyCloneable, SubObject};

class IndexController extends AbstractActionController
{
	public function indexAction()
	{
		$viewModel = new ViewModel();
		$viewModel->setTemplate('layout/blog01');

		return $viewModel;
	}

  public function landingPageAction()
  {
    $viewModel = new ViewModel();
    $viewModel->setTemplate('layout/landingTest');

    return $viewModel;
  }
}
