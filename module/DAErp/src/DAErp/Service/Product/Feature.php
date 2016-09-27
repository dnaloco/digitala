<?php 
namespace DAErp\Service\Product;

use DACore\Service\AbstractCrudService;

class Feature extends AbstractCrudService
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