<?php
namespace DADummyTest\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\Common\Collections\ArrayCollection;

class DummyIndexController extends AbstractActionController
{
	use \DADummyTest\DummyStrategy\FixtureStrategies;

	public function __construct($em)
	{
		$this->em = $em;
	}

    public function indexAction()
    {

        return new ViewModel();
    }

}
