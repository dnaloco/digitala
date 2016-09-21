<?php
namespace DACore\Entity\Erp\Product;

interface ProductInterface
{
	function getId();
	function getId();

	function getReference();
	function setReference();

	function getTitle();
	function setTitle();

	function getSubtitle();
	function setSubtitle();

	function getManufacturer();
	function setManufacturer();

	function getSeoDescription();
	function setSeoDescription();

	function getDescription();
	function setDescription();

	function getBriefDescription();
	function setBriefDescription();

	function getDeparment();
	function setDeparment();

	function getCategory();
	function setCategory();

	function getFeatures();
	function setFeatures();

	function getImages();
	function setImages();

	function getVideos();
	function setVideos();

	function getUnitType();
	function setUnitType();

	function getPackageType();
	function setPackageType();

	function getWeight();
	function setWeight();

	function getDimensionLength();
	function setDimensionLength();

	function getDimensionHeight();
	function setDimensionHeight();

	function getDimensionWidth();
	function setDimensionWidth();

	function getProductRatings();
	function setProductRatings();

	function getSuppliers();
	function setSuppliers();

	function getAlternativeProducts();
	function setAlternativeProducts();

	function getIsHighlighted();
	function setIsHighlighted();

	function getIsLaunch();
	function setIsLaunch();

	function getStores();
	function setStores();

	function getCreatedAt();
	function setCreatedAt();

	function getUpdatedAt();
	function setUpdatedAt();
}