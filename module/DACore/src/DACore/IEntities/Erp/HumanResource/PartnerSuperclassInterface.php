<?php
namespace DACore\IEntities\Erp\HumanResource;

interface PartnerSuperclassInterface
{
	function getId();
	function getPerson();
	function getCompany();

	function getOccupation();

	function getAccounts();

	function getOnComission();

	function getComissions();
	function getRewards();
	function getBenefits();
	function getSalaries();
	function profitShares();

	function getHiredDate();
	function getFiredDate();

	function getCreatedAt();
	function getUpdatedAt();
}