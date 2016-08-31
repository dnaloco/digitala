<?php 
namespace DACore\Entity\Base;

interface CurrencyInterface
{
	function getId();
	function getName();
	function getSymbol();
	function getRate();
}