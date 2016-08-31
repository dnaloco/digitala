<?php
namespace DAUser\Listener;

use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;

class ConfirmationListener implements ListenerAggregateInterface
{
	protected $listeners = array();

	public function attach(EventManagerInterface $events)
	{
		$sharedEvents = $events->getSharedManager();
		$this->listeners[] = $sharedEvents->attach('DASite\Controller\IndexController', 'onCreateUser', array($this, 'onEmailConfirmation'), 100);
	}

	public function detach(EventManagerInterface $events)
	{
		foreach($this->listeners as $index => $listener) {
			if ($events->detach($listener)) {
				unset($this->listeners[$index]);
			}
		}
	}

	public function onEmailConfirmation($e)
	{
		var_dump($e->getParams);
	}
}