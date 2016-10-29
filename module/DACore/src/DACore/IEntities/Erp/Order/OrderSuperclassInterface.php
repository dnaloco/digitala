<?php
namespace DACore\IEntities\Erp\Order;

interface OrderSuperclassInterface
{
	function getId();
	function getNoNF();
	function getClaimant();
	function getReceiver();
	function getDateApproved();
	function getShipper();
	function getShippingType();
	function getShippingCost();
	function getDateShipped();
	function getTrackingCode();
	function getExpectedDeliveryDate();
	function getDateDelivered();
	function getTotalOrderCost();
	function getDiscount();
	function getDiscountType();
	function getTotalWithDiscount();
	function getPayments();
	function getPaymentType();
	function getOrderReason();
	function getCreatedAt();
	function getUpdatedAt();
}