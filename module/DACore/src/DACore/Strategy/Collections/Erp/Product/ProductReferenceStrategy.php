<?php
namespace DACore\Strategy;

trait ProductReferenceStrategy
{
	public function generateReference($departmentId, $categoryId, $productId)
	{
		return $departmentId . '-' . $categoryId  . '-' . $productId;
	}
}