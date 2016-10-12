<?php
namespace DACore\IEntities\Erp\Order\Expense;

interface ExpenseInterface
{
	function getId();
	function getTile();
	function getCategory();
	function getConsumption();
	function getStore();
	function getUnitType();
	function getDescription();
	function getExpenseType();
}