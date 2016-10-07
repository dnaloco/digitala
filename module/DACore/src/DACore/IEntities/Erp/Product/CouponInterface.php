<?php
namespace DACore\IEntities\Erp\Product;

interface CouponInterface
{
	function getId();
	function getCoupon();
	function getDescription();
	function getDiscount();
	function getStartTime();
	function getStartDate();
	function getFinishDate();
	function getEndTime();
	function getQuantity();
	function getUnlimited();
	function getProducts();
	function getMixProducts();
	function getDepartments();
	function getCategories();
	function getAuto();
	function getCreatedAt();
	function getUpdatedAt();
}