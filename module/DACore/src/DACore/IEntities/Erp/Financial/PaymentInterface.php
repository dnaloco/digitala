<?php
namespace DACore\Entity\Financial;

interface PaymentInterface
{
	function getId();
	function getAmountIncome();
	function getAmountOutcome();
	function getCurrency();
	function getInvoiceDate();
	function getExpirationDate();
	function getPaymentDate();
	function getOrder();
	function getPaymentMethod();
	function getPaymentType();
	function getStatus();
	function getCreditCardAuthCode();
	function getCreatedAt();
	function getUpdatedAt();
}