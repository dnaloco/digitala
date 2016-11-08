<?php
namespace DACore\IEntities\Erp\Financial;

interface AccountSuperclassInterface
{
	function getId();
	function getPartner();
	function getDescription();
	function getAmount();
	function getAmountMinimun();
	function getAmountDesired();
	function getAccountancyCode();
	function getCreatedAt();
	function getUpdatedAt();
}