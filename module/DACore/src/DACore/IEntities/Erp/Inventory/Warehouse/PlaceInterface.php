<?php
namespace DACore\IEntities\Erp\Inventory\Warehouse;

interface PlaceInterface
{
	function getId();
	function getDescription();
	function getWarehouse();
	function getChildren();
	function getParent();
	function getDestinationType();
}