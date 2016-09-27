<?php
namespace DACore\Entity\Erp\Product;

interface MixProductInterface
{
	function getId();
	function setId($id);

	function getProducts();
	function setProducts($products);

	function getDiscount();
	function setDiscount($discount);

	function getIsHighlighted();
	function setIsHighlighted(bool $isHighlighted);

	function getIsLaunch();
	function setIsLaunch(bool $isLaunch);

	function getCreatedAt();
	function setCreatedAt(\DateTime $createdAt);

	function getUpdatedAt();
	function setUpdatedAt(\DateTime $updatedAt);
}