<?php
namespace DACore\IEntities\Erp\Order\Rental;

interface RentalInterface
{
	function getId();
	function getStore();
	function getUnitPrice();
	function getTotalPrice();
	function getDiscount();
	function getDiscountType();
	function getCost();
	function getQuantity();
	function getExpectedDevolution();
}