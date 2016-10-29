<?php
namespace DACore\IEntities\Erp\Financial\Accounts;

interface BankInterface
{
	function getName();
	function getManager();
	function getAgency();
	function getNumber();
	function getDigit();
	function getSavingAmount();
}