<?php
namespace DACore\IEntities\Erp\Financial\Accounts;

interface BankInterface
{
	function getName();
	function getCode();
	function getManager();
	function getAgency();
	function getNumber();
	function getDigit();
	function getAddress();
	function getSavingAmount();
}