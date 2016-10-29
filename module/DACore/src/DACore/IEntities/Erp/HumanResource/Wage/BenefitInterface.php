<?php
namespace DACore\IEntities\Erp\HumanResource\Wage;

interface BenefitInterface
{
	function getId();
	function getName();
	function getDescription();
	function getCost();
	function getPayDays();
	function getPartner();
	function getCreatedAt();
	function getUpdatedAt();
}