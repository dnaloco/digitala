<?php
namespace DACore\IEntities\Erp\Inventory\Parked;

interface ReservationInterface
{
	function getId();
	function getToCustomer();
	function getUser();
	function getStore();
	function getStorage();
	function getQuantity();
	function getKeepUpUntil();
	function getCreatedAt();
	function getUpdatedAt();
}