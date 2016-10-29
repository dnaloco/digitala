<?php
namespace DACore\IEntities\Erp\Inventory\Parked;

interface DevolutionInterface
{
	function getId();
	function getFromCustomer();
	function getVendor();
	function getSaleOrder();
	function getReplaceds();
	function getQuantity();
	function getDevolutionDate();
	function getReason();
	function getStatus();
	function getCreatedAt();
	function getUpdatedAt();
}