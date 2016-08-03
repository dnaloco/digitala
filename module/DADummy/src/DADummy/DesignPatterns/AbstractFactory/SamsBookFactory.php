<?php 
namespace DADummy\DesignPatterns\AbstractFactory;

class SamsBookFactory extends AbstractBookFactory
{
	private $context = "Sams";

	function makePHPBook()
	{
		return new SamsPHPBook;
	}

	function makeMySQLBook()
	{
		return new SamsMySQLBook;
	}
}