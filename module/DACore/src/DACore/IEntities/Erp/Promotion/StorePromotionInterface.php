<?php
namespace DACore\IEntities\Erp\Promotion;

interface StorePromotionInterface
{
	function getId();
	function getStores();
	function getPromotionType();
	function getRules();
	function getStatus();
	function getCreatedAt();
	function getUpdatedAt();
}