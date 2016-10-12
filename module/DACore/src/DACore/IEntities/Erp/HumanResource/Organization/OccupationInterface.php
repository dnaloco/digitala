<?php
namespace DACore\IEntities\Erp\HumanResource\Organization;

interface OccupationInterface
{
	function getId();
	function getTitle();
	function getDescription();
	function getDepartment();
	function getParent();
	function getChildren();
	function getBurdens();
}