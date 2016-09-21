<?php 
namespace DAErp\Service\Product;

use DACore\Crud\AbstractCrudService;

class MixProduct extends AbstractCrudService
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