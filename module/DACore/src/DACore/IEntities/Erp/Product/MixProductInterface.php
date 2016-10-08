<?php
namespace DACore\IEntities\Erp\Product;

interface MixProductInterface
{
	function getId();
	function getProducts();
	function getDiscount();
	function getDiscountType();
	function getIsHighlighted();
	function getIsLaunch();
	function getCreatedAt();
	function getUpdatedAt();
}