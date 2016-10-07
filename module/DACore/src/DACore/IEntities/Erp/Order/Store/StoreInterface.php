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
	function getUnitDiscountPrice();
	function getSellWithDiscountPrice();
	function getStoreStatus();
	function getUpdatedAt();
}