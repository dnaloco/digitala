<?php
namespace DACore\Entity\Erp\Product;

interface CategoryInterface
{
	function getId();
	function setId();
	function getName();
	function setName();
	function getSeoDescription();
	function setSeoDescription();
	function getIsDisabled();
	function setIsDisabled();
}