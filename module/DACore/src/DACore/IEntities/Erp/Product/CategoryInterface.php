<?php
namespace DACore\IEntities\Erp\Product;

interface CategoryInterface
{
	function getId();
	function getName();
	function getChildren();
	function getParent();
	function getSeoDescription();
	function getIsDisabled();
}