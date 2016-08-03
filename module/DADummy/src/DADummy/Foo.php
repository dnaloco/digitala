<?php
namespace DADummy;

use Zend\EventManager\{EventManager, EventManagerAwareInterface, EventManagerInterface};

class Foo implements EventManagerAwareInterface
{
	protected $events;

	public function setEventManager(EventManagerInterface $events)
	{
		$this->events = $events;
		return $this;
	}

	public function getEventManager()
	{
		if (!$this->events) {
			$this->setEventManager(new EventManager(__CLASS__));
		}

		return $this->events;
	}

	public function bar($baz, $bat = null) {
		echo __FUNCTION__;
		$params = compact('baz', 'bat');
		$this->getEventManager()->trigger(__FUNCTION__, $this, $params);
	}
}