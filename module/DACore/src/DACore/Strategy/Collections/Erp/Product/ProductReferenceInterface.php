<?php
namespace DACore\Strategy;

interface ProductReferenceInterface
{
	function generateReference($departmentId, $categoryId, $productId);
}