<?php
namespace DACore\Entity\Erp\Product;

interface MixProductInterface
{
	function getId();
	function setId();

	function getProducts();
	function setProducts();

	function getDiscount();
	function setDiscount();

	function getIsHighlighted();
	function setIsHighlighted();

	function getIsLaunch();
	function setIsLaunch();

	function getCreatedAt();
	function setCreatedAt();

	function getUpdatedAt();
	function setUpdatedAt();
}