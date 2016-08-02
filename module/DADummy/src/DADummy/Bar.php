<?php 
namespace DADummy;

use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;

class Bar implements ListenerAggregateInterface
{
	protected $listeners = array();

	public function attach(EventManagerInterface $e)
	{
		$this->listeners[] = $e->attach('Bar.pre', array($this, 'load'));
		$this->listeners[] = $e->attach('Bar.post', array($this, 'save'));
	}

	public function detach(EventManagerInterface $e)
	{
		foreach ($this->listeners as $index => $listener) {
			if ($e->detach($listener)) {
				unset($this->listeners[$index]);
			}
		}
	}

	public function load(EventInterface $e) {
		echo 'load...';
	}

	public function save(EventInterface $e) {
		echo 'save...';
	}
}