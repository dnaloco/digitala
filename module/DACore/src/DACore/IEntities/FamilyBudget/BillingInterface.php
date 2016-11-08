<?php
namespace DACore\IEntities\FamilyBudget;

interface BillingInterface
{
	function getId();
	function getCategory();
	function getPaymentDate();
	function getPaymentMethod();
	function getAmountIncome();
	function getAmountOutcome();
	function getCreatedAt();
	function getUpdatedAt();
}