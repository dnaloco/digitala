<?php
namespace DADummy\Listener;

use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;

class SendListener implements ListenerAggregateInterface
{
	protected $listeners = array();

	public function attach(EventManagerInterface $events)
	{
		$sharedEvents 		= $events->getSharedManager();
		$this->listeners[] 	= $sharedEvents->attach('DADummy\Service\TweetService', 'sendTweet', array($this, 'onSendTweet'), 100);
	}

	public function detach(EventManagerInterface $events)
	{
		foreach($this->listeners as $index => $listener) {
			if ($events->detach($listener)) {
				unset($this->listeners[$index]);
			}
		}
	}

	public function onSendTweet($e)
	{
		var_dump($e);
	}
}