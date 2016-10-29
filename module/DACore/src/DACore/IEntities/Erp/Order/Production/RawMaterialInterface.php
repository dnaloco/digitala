<?php
namespace DACore\IEntities\Erp\Order\Production;

interface RawMaterialInterface
{
	function getId();
	function getStore();
	function getQuantity();
	function getIsReceived();
}