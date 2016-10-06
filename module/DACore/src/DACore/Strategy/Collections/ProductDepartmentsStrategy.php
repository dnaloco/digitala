<?php
namespace DACore\Strategy\Collections;

use Doctrine\Common\Collections\ArrayCollection;

trait ProductDepartmentsStrategy
{
	public function getProductDepartmentsReferences($key, $productDepartments, $field)
	{
		$arrProductDepartments = new ArrayCollection();
		foreach ($productDepartments as $productDepartmentId) {
			if(isset($productDepartmentId['id'])) $productDepartmentId = $productDepartmentId['id'];
			$productDepartment = $this->em->getReference('DAErp\Entity\Product\Department', $productDepartmentId);

			if ($productDepartment) $arrProductDepartments->add($productDepartment);

			else {
				self::addDataError($key, self::ERROR_INVALID_REFERENCE, $field, $productDepartmentId);
				return false;
			}
		}
		return $arrProductDepartments;
	}
}