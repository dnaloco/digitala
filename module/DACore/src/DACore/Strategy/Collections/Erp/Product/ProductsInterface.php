<?php
namespace DACore\Strategy\Collections;

interface ProductsInterface
{
	function getProductsCollection($key, $products, $entity);
}