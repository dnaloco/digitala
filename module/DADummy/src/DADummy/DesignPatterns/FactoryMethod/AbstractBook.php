<?php
namespace DADummy\DesignPatterns\FactoryMethod;

abstract class AbstractBook
{
	abstract function getAuthor();
	abstract function getTitle();
}