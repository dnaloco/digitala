<?php
namespace DADummy\DesignPatterns\FactoryMethod;

class SamsPHPBook extends AbstractPHPBook
{
	private $author;
	private $title;

	function __construct()
	{
		mt_srand((double)microtime() * 10000000);
		$rand_num = mt_rand(0, 1);

		if (1 > $rand_num) {
			$this->author = 'George Schlossnagle';
			$this->title = 'Advanced PHP Programming';
		} else {
			$this->author = 'Christian Wenz';
			$this->title = 'PHP Phrasebook';
		}
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