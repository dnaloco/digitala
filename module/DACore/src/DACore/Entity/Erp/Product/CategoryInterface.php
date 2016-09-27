<?php
namespace DACore\Entity\Erp\Product;

interface CategoryInterface
{
	function getId();
	function setId($id);

	function getName();
	function setName($name);

	function getSeoDescription();
	function setSeoDescription($seoDescription);
	
	function getIsDisabled();
	function setIsDisabled($isDisabled);
}