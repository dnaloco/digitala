<?php
namespace DADummy\Service;

use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;

class TweetService implements EventManagerAwareInterface
{
	protected $eventManager;

	public function sendTweet($content)
	{
		$this->getEventManager()->trigger('sendTweet', null, array('content' => $content));

	}

	public function setEventManager(EventManagerInterface $eventManager)
	{
		$eventManager->addIdentifiers(array(
			'DADummy\Service\ServiceInterface',
			get_called_class()
		));

		$this->eventManager = $eventManager;
	}

	public function getEventManager()
	{
		if (null === $this->eventManager) {
			$this->setEventManager(new EventManager());
		}

		return $this->eventManager;
	}
}