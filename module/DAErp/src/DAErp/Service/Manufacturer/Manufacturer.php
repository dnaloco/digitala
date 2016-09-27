<?php 
namespace DAErp\Service\Manufacturer;

use DACore\Service\AbstractCrudService;

class Manufacturer extends AbstractCrudService
{

	public function prepareDataToInsert(array $data)
    {
    	var_dump($data);die;
    	return $data;
    }

	public function prepareDataToUpdate(array $data)
	{
		return $data;
	}
}