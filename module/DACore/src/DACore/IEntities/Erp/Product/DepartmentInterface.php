<?php
namespace DACore\IEntities\Erp\Product;

interface DepartmentInterface
{
	function getId();
	function getName();
	function getSeoDescription();
	function getIsDisabled();
}