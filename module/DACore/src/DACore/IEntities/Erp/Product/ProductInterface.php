<?php
namespace DACore\IEntities\Erp\Product;

interface ProductInterface
{
	function getId();
	function getReference();
	function getTitle();
	function getSubtitle();
	function getManufacturer();
	function getSuppliers();
	function getSeoDescription();
	function getDescription();
	function getBriefDescription();
	function getDepartment();
	function getCategory();
	function getFeatures();
	function getImages();
	function getVideos();
	function getUnitType();
	function getPackageQtty();
	function getWeight();
	function getDimensionLength();
	function getDimensionHeight();
	function getDimensionWidth();
	function getRatings();
	function getAlternativeProducts();
	function getIsHighlighted();
	function getIsLaunch();
	function getStores();
	function getStatus();
	function getCreatedAt();
	function getUpdatedAt();
}