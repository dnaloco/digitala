<?php
namespace DACore\IEntities\Erp\Inventory\Warehouse;

interface WarehouseInterface
{
	function getId();
	function getName();
	function getDescription();
	function getAddress();
	function getCompany();
	function getPlaces();
}