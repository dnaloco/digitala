<?php
namespace DACore\IEntities\Erp\Inventory\Parked;

interface DiscrepancyInterface
{
	function getId();
	function getUser();
	function getStore();
	function getQuantity();
	function getReason();
	function getDiscrepancyStatus();
	function getCreatedAt();
	function getUpdatedAt();
}