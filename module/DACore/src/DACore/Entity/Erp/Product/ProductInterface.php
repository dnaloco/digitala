<?php
namespace DACore\Entity\Erp\Product;

interface ProductInterface
{
	function getId();
	function setId($id);

	function getReference();
	function setReference($reference);

	function getTitle();
	function setTitle($title);

	function getSubtitle();
	function setSubtitle($subtitle);

	function getManufacturer();
	function setManufacturer($manufacturer);

	function getSeoDescription();
	function setSeoDescription($seoDescription);

	function getDescription();
	function setDescription($description);

	function getBriefDescription();
	function setBriefDescription($briefDescription);

	function getDepartment();
	function setDepartment($deparment);

	function getCategory();
	function setCategory($category);

	function getFeatures();
	function setFeatures($features);

	function getImages();
	function setImages($images);

	function getVideos();
	function setVideos($videos);

	function getUnitType();
	function setUnitType($unitType);

	function getPackageType();
	function setPackageType($packageType);

	function getWeight();
	function setWeight($weight);

	function getDimensionLength();
	function setDimensionLength($dimensionLength);

	function getDimensionHeight();
	function setDimensionHeight($dimensionHeight);

	function getDimensionWidth();
	function setDimensionWidth($dimensionWidth);

	function getProductRatings();
	function setProductRatings($productRatings);

	function getAlternativeProducts();
	function setAlternativeProducts($alternativeProducts);

	function getIsHighlighted();
	function setIsHighlighted($isHighlighted);

	function getIsLaunch();
	function setIsLaunch($isLaunch);

	function getStores();
	function setStores($stores);

	function getCreatedAt();
	function setCreatedAt(\DateTime $createdAt);

	function getUpdatedAt();
	function setUpdatedAt(\DateTime $updatedAt);
}