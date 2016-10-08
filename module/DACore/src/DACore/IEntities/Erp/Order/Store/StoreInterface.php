<?php
namespace DACore\IEntities\Erp\Order\Store;

interface StoreInterface
{
	function getId();
	function getProduct();
	function getQuantity();

	function getMinimalQtdeOnStock();

	function getUnitCost();
	function getUnitPrice();
	function getDiscount();
	function getDiscountType();
	function getStorages();
	function getStatus();
	function getUpdatedAt();
}