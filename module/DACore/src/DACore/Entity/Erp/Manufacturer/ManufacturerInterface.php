<?php
namespace DACore\Entity\Erp\Manufacturer;

interface ManufacturerInterface
{
	function getId();
	function setId($id);

	function getCompany();
	function setCompany($company);

	function getProducts();
	function setProducts($products);
}