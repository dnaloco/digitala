<?php 
namespace DAErp\Service\Manufacturer;

use DACore\Crud\AbstractCrudService;

class Manufacturer extends AbstractCrudService
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