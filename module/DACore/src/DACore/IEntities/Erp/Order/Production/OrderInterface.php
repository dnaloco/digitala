<?php
namespace DACore\IEntities\Erp\Order\Production;

interface OrderInterface
{
	function getRawMaterials();
	function getSubItems();
	function getProduction();
}