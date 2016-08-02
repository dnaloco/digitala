<?php 
namespace DADummy\DesignPatterns\AbstractFactory;

abstract class AbstractBookFactory
{
	abstract function makePHPBook();
	abstract function makeMySQLBook();
}