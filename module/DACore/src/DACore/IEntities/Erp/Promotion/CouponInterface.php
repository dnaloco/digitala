<?php
namespace DACore\IEntities\Erp\Promotion;

interface CouponInterface
{
	function getId();
	function getCoupon();
	function getDescription();
	function getDiscount();
	function getDiscountType();

	function getStartDate();
	function getEndDate();

	function getQuantity();
	function getUnlimited();

	function getProducts();
	function getDepartments();
	function getCategories();

	function getStatus();
	
	function getCreatedAt();
	function getUpdatedAt();
}