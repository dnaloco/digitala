<?php 
namespace DADummy\DesignPatterns\Prototype;

class MyCloneable
{
	public $object1;
	public $object2;

	function __clone()
	{
		$this->object1 = clone $this->object1;
	}
}