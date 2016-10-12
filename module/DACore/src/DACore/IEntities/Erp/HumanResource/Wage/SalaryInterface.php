<?php
namespace DACore\IEntities\Erp\HumanResource\Wage;

interface SalaryInterface
{
	function getId();
	function getCostBy();
	function getCost();
	function getPayDays();
	function getPartner();
	function getCreatedAt();
	function getUpdatedAt();
}