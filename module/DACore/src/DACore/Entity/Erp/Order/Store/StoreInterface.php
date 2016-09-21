<?php
namespace DACore\Entity\Erp\Order\Store;

interface StoreInterface
{
	function getId();
	function setId();

	function getProduct();
	function setProduct();

	function getQuantity();
	function setQuantity();

	function getMinimalQtdeOnStock();
	function setMinimalQtdeOnStock();

	function getUnitCost();
	function setUnitCost();

	function getUnitPrice();
	function setUnitPrice();

	function getUnitDiscountPrice();
	function setUnitDiscountPrice();

	function getSellWithDiscountPrice();
	function setSellWithDiscountPrice();

	function getStoreStatus();
	function setStoreStatus();

	function getUpdatedAt();
	function setUpdatedAt();
}