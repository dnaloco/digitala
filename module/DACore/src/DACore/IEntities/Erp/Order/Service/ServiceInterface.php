<?php
namespace DACore\IEntities\Erp\Order\Service;

interface ServiceInterface
{
	function getId();
	function getExpenses();
	function getTimeQuantity();
	function getUnitPrice();
	function getDiscount();
	function getDiscountType();
	function getTotalPrice();
}