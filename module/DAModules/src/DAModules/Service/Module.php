<?php 
namespace DAModules\Service;

use DACore\Crud\AbstractCrudService;

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