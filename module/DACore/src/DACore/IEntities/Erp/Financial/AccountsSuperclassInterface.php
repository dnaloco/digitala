<?php
namespace DACore\IEntities\Erp\Financial;

interface AccountsSuperclassInterface
{
	function getId();
	function getPartner();
	function getAmount();
	function getDescription();
	function getCreatedAt();
	function getUpdatedAt();
}