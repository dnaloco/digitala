<?php
namespace DACore\IEntities\Erp\Order\Expense;

interface ExpenseInterface
{
	function getId();
	function getTitle();
	function getCategory();
	function getConsumption();
	function getCost();
	function getStore();
	function getUnitType();
	function getDescription();
	function getType();
}