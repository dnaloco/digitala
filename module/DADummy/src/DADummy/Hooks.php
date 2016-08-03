<?php 
namespace DADummy;

class Hooks {
	private $hooks;

	public function __construct()
	{
		$this->hooks = array();
	}

	public function add($name, $callback)
	{
		if (!is_callable($callback, true)) {
			throw new \InvalidArgumentException(sprintf('Invalid callback: %s', print_r($callback, true)));
		}

		$this->hooks[$name][] = $callback;
	}

	public function getCallbacks($name)
	{
		return $this->hooks[$name] ?? array();
	}

	public function fire($name)
	{
		foreach($this->getCallbacks($name) as $callback) {
			if (!is_callable(($callback))) 
				continue;

			call_user_func($callback);
		}
	}
}