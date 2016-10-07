<?php 
namespace DACore\IEntities\Base;

interface CurrencyInterface
{
	function getId();
	function getName();
	function getSymbol();
	function getRate();
}