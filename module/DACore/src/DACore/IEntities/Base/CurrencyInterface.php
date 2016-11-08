<?php 
namespace DACore\IEntities\Base;

interface CurrencyInterface
{
	function getId();
	function getName();
	function getCode();
	function getMajorSymbol();
	function getMinorSymbol();
	function getRate();
	function getStandard();
}