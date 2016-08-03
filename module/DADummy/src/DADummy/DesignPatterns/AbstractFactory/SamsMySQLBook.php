<?php 
namespace DADummy\DesignPatterns\AbstractFactory;

class SamsMySQLBook extends AbstractMySQLBook
{
	private $author;
	private $title;

	function __construct()
	{
		$this->author = 'Paul Dubois';
		$this->title = 'MySQL, 3rd Edition';
	}

	function getAuthor()
	{
		return $this->author;
	}

	function getTitle()
	{
		return $this->title;
	}
}