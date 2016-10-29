<?php
namespace DACore\IEntities\Erp\Supplier;

interface SupplierInterface
{
	function getId();
	function getCompany();
	function getProducts();
	function getBudgets();
	function getQualityRatings();
	function getStatus();
	function getNotes();
	function getCreatedAt();
	function getUpdatedAt();
}