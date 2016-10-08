<?php
namespace DACore\IEntities\Erp\Inventory\Warehouse;

interface StorageInterface
{
	function getId();
	function getStore();
	function getQuantity();
	function getPlace();
}