<?php
namespace DACore\IEntities\FamilyBudget;

interface CategoryInterface
{
	function getId();
	function getUser();
	function getTitle();
	function getType();
	function getIntendedBillAmountPerMonth();
	function getBillings();
}