<?php 
namespace DAErp\Service\Product;

use DACore\Crud\AbstractCrudService;

class Coupon extends AbstractCrudService
{

	public function prepareDataToInsert(array $data)
    {
    	return $data;
    }

	public function prepareDataToUpdate(array $data)
	{
		return $data;
	}
}