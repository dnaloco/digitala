<?php
namespace DACore\IEntities\Erp\Order;

interface OrderSuperclassInterface
{
	function getId();
	function getNoNF();
	function getUser();
	function getDateApproved();
	function getShipper();
	function getShippingType();
	function getShippingCost();

	function getDateShipped();
	function getExpectedDeliveryDate();
	function getDateDelivered();
	function getTotalOrderCost();
	function getDiscountPercentage();
	function getTotalWithDiscount();
	function getPayments();
	function getPaymentType();
	function getOrderReason();
	function getCreatedAt();
	function getUpdatedAt();
}