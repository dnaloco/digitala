<?php 
namespace DABase\Service;

use DACore\Service\AbstractCrudService;

class GoodTag extends AbstractCrudService
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