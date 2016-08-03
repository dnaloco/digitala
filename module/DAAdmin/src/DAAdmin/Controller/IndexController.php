<?php
namespace DAAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
	
	public function indexAction()
	{
		$layoutType = getenv("APPLICATION_ENV") ?? '';

		$viewModel = new ViewModel();
		$viewModel->setTemplate('layout/admin01' . $layoutType);

		return $viewModel;
	}
}