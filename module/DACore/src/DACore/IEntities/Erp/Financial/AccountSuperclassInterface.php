<?php
namespace DACore\IEntities\Erp\Financial;

interface AccountSuperclassInterface
{
	function getId();
	function getPartner();
	function getAmount();
	function getDescription();
	function getCreatedAt();
	function getUpdatedAt();
}