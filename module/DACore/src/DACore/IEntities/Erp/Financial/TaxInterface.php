<?php
namespace DACore\IEntities\Erp\Financial;

interface TaxInterface
{
	function getId();
	function getName();

	function getRate();

	function getIsFederal();
	function getIsState();
	function getIsMunicipal();

	function getState();
	function getCity();

	function getInfo();
}