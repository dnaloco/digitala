<?php
namespace DACore\Strategy\Collections;

interface ProductDepartmentsInterface
{
	function getProductDepartmentsReferences($key, $productDepartments, $field);
}