<?php
namespace DACore\IEntities\Erp\Product;

interface CategoryInterface
{
	function getId();
	function getName();
	function getSeoDescription();
	function getIsDisabled();
}