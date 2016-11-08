<?php
namespace DACore\IEntities\Erp\Financial;

interface PaymentInterface
{
	function getId();
	function getInstallments();
	function getInstallmentIndex();
	function getAmountIncome();
	function getAmountOutcome();
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