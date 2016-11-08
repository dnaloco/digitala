<?php
namespace DACore\IEntities\Erp\Inventory\Warehouse;

interface TransferenceInterface
{
	function getId();
	function getUser();
	function getFromStorage();
	function getToStorage();
	function getQuantity();
	function getCreatedAt();
	function getUpdatedAt();
}