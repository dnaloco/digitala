<?php
namespace DACore\IEntities\Erp\Supplier;

interface ProductBudgetInterface
{
	function getId();
	function getProduct();
	function getUnitPrice();
	function getQuantity();

}