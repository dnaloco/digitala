<?php
namespace DACore\Entity\Erp\Order;

interface OrderSuperclassInterface
{
	function getId();
	function setId();

	function getUser();
	function setUser();

	function getShipper();
	function setShipper();

	function getShippingType();
	function setShippingType();

	function getShippingCost();
	function setShippingCost();

	function getShippingExpense();
	function setShippingExpense();

	function getDateShipped();
	function setDateShipped();

	function getExpectedDeliveryDate();
	function setExpectedDeliveryDate();

	function getDateDelivered();
	function setDateDelivered();

	function getTotalOrderCost();
	function setTotalOrderCost();

	function getDiscount();
	function setDiscount();

	function getTaxes();
	function setTaxes();

	function getPayments();
	function setPayments();

	function getPaymentType();
	function setPaymentType();

	function getOrderReason();
	function setOrderReason();

	function getCreatedAt();
	function setCreatedAt();

	function getUpdatedAt();
	function setUpdatedAt();
}