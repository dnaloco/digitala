<?php
namespace DADummy\DesignPatterns\Observer;

class PatternSubject extends AbstractSubject 
{
	private $favoritePatterns = NULL;
	private $observers = array();

	function __construct() {}

	function attach(AbstractObserver $observer_in) {
		$this->observers[] = $observer_in;
	}

	function detach(AbstractObserver $observer_in) {
		foreach ($this->observers as $okey => $oval) {
			if ($oval == $observer_in) {
				unset($this->observers[$okey]);
			}
		}
	}

	function notify() {
		foreach($this->observers as $obs) {
			$obs->update($this);
		}
	}

	function updateFavorites($newFavorites) {
		$this->favorites = $newFavorites;
		$this->notify();
	}

	function getFavorites() {
		return $this->favorites;
	}
}