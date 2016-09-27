<?php
namespace DACore\Entity\Erp\Product;

interface CouponInterface
{
	function getId();
	function setId($id);

	function getCoupon();
	function setCoupon($coupon);

	function getDescription();
	function setDescription($description);

	function getDiscount();
	function setDiscount($discount);

	function getStartDate();
	function setStartDate(\DateTime $startDate);

	function getFinishDate();
	function setFinishDate(\DateTime $finishDate);

	function getQuantity();
	function setQuantity($quantity);

	function getUnlimited();
	function setUnlimited($unlimited);

	function getProducts();
	function setProducts($products);

	function getMixProducts();
	function setMixProducts($mixProducts);

	function getDepartments();
	function setDepartments($departments);

	function getCategories();
	function setCategories($categories);

	function getCreatedAt();
	function setCreatedAt(\DateTime $createdAt);

	function getUpdatedAt();
	function setUpdatedAt(\DateTime $updatedAt);
}