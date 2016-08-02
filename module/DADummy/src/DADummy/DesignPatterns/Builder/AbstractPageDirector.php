<?php 
namespace DADummy\DesignPatterns\Builder;

abstract class AbstractPageDirector
{
	abstract function __construct(AbstractPageBuilder $builder_in);
	abstract function buildPage();
	abstract function getPage();
}