<?php
namespace DACore\IEntities\Erp\Order\Production;

interface ProductionInterface
{
	function getId();
	function getProductionProcess();
	function getIsFinished();
	function getStoreOrder();
	function getCreatedAt();
	function getUpdatedAt();
	
}