<?php
namespace DACore\Strategy\Collections\Erp\Product;

interface ProductReferenceInterface
{
	function generateReference($departmentId, $categoryId, $productId);
}