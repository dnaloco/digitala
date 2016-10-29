<?php
namespace DACore\IEntities\Erp\HumanResource;

interface PartnerSuperclassInterface
{
	function getId();
	function getPerson();

	function getOccupation();

	function getAccounts();

	function getOnComission();

	function getComissions();
	function getRewards();
	function getBenefits();
	function getSalaries();
	function getProfitShares();

	function getHiredDate();
	function getFiredDate();

	function getCreatedAt();
	function getUpdatedAt();
}