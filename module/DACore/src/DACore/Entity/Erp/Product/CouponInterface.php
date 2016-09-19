<?php
namespace DACore\Entity\Erp\Product;

interface CouponInterface
{
	function getId();
	function setId();

	function getCoupon();
	function setCoupon();

	function getDescription();
	function setDescription();

	function getDiscount();
	function setDiscount();

	function getStartDate();
	function setStartDate();

	function getFinishDate();
	function setFinishDate();

	function getIsIlimitedDate();
	function setIsIlimitedDate();

	function getIsIlimitedQuantity();
	function setIsIlimitedQuantity();

	function getQuantity();
	function setQuantity();

	function getProduct();
	function setProduct();

	function getMixProduct();
	function setMixProduct();

	function getDepartment();
	function setDepartment();

	function getCategory();
	function setCategory();

	function getCreatedAt();
	function setCreatedAt();

	function getUpdatedAt();
	function setUpdatedAt();
}