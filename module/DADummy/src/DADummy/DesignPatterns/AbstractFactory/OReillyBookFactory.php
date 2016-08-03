<?php 
namespace DADummy\DesignPatterns\AbstractFactory;

class OReillyBookFactory extends AbstractBookFactory
{
	private $context = "OReilly";

	function makePHPBook()
	{
		return new OReillyPHPBook;
	}
	function makeMySQLBook()
	{
		return new OReillyMySqlBook;
	}
}