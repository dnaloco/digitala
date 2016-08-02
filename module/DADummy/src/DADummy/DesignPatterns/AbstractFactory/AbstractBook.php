<?php 
namespace DADummy\DesignPatterns\AbstractFactory;

abstract class AbstractBook
{
	abstract function getAuthor();
	abstract function getTitle();
}