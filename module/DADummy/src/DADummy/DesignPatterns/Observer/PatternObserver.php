<?php
namespace DADummy\DesignPatterns\Observer;

class PatternObserver extends AbstractObserver
{
	public function __construct() {

	}

	public function update(AbstractSubject $subject)
	{
		echo '*IN PATTERN OBSERVER - NEW PATTERN GOSSIP ALERT*<br>';
		echo 'new favorite patterns: ' . $subject->getFavorites() . '<br>';
		echo '*IN PATTERN OBSERVER - PATTERN GOSSIP ALERT OVER*<br>';
	}
}