<?php
namespace DACore\IEntities\Erp\Promotion;

interface MarketPromotionInterface
{
	function getId();
	function getDescription();
	function getDiscount();
	function getDiscountType();
	function getStartTime();
	function getStartDate();
	function getEndDate();
	function getEndTime();
	function getWeekDays();

	function getProducts();
	function getDepartments();
	function getCategories();
	
	function getStatus();

	function getCreatedAt();
	function getUpdatedAt();


}