<?php
namespace DACore\Strategy\Collections\Erp\Product;

trait ProductReferenceStrategy
{
	public function generateReference($departmentId, $categoryId, $productId)
	{
		return $departmentId . '-' . $categoryId  . '-' . $productId;
	}
}