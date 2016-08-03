<?php 
namespace DADummy\DesignPatterns\Observer;

abstract class AbstractObserver {
	abstract function update(AbstractSubject $subject_in);
}