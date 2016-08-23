<?php 
namespace Tweet\Service;

use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventManager;

class TweetService implements EventManagerAwareInterface
{
	protected $eventManager;

	/**
	 * @param  string $content string to send a tweet through Twitter API
	 */
	public function sendTweet($content)
	{
		echo $content;
		$this->getEventManager()->trigger('sendTweet', null, array('content' => $content));
	}

	public function setEventManager(EventManagerInterface $eventManager)
	{
		$eventManager->addIdentifiers(array(
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