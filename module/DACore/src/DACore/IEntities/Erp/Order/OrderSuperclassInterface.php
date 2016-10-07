<?php
namespace DACore\IEntities\Erp\Order;

interface OrderSuperclassInterface
{
	function getId();
	function getUser();
	function getShipper();
	function getShippingType();
	function getShippingCost();
	function getShippingExpense();
	function getDateShipped();
	function getExpectedDeliveryDate();
	function getDateDelivered();
	function getTotalOrderCost();
	function getDiscount();
	function getTaxes();
	function getPayments();
	function getPaymentType();
	function getOrderReason();
	function getCreatedAt();
	function getUpdatedAt();
}