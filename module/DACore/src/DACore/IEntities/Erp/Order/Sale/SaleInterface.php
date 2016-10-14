<?php
namespace DACore\IEntities\Erp\Order\Sale;

interface SaleInterface
{
	function getId();
	function getStore();
	function getQuantity();
	function getUnitPrice();
	function getDiscount();
	function getDiscountType();
	function getTotalPrice();
}