<?php
namespace DADummy\DesignPatterns\FactoryMethod;

class VisualQuickstartPHPBook extends AbstractPHPBook
{
	private $author;
	private $title;

	function __construct()
	{
		$this->author = 'Larry Ullman';
		$this->title = 'PHP for the World Wide Web';
	}

	function getAuthor() { return $this->author; }
	function getTitle() { return $this->title; }

	function __toString()
	{
		$text = <<<HEREDOC
			Author: {$this->author} <br>
			Title: {$this->title} <br>
HEREDOC;
		return $text;
	}
}