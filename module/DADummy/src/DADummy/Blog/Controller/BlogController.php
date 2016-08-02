<?php
namespace DADummy\Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BlogController extends AbstractActionController
{

	public function postAction ()
	{
		//$service = $this->getServiceLocator()->get('Blog\Service\Post');
		$postId = $this->getEvent()->getRouteMatch()->getParam('postId');
		return new ViewModel();
	}
}