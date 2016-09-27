<?php 
namespace DAModules\Service;

use DACore\Service\AbstractCrudService;

class Module extends AbstractCrudService
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