<?php
namespace DACore\IEntities\Erp\Supplier;

interface BudgetInterface
{
	function getId();
	function getProductBudgets();
	function getSupplier();
	function getValidity();
	function getTotal();
	function getDiscountPercentage();
	function getTotalWithDiscount();
	function getMainContact();
	function getCreatedAt();
	function getUpdatedAt();
}