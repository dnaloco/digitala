<?php 
namespace DABase\Service;

use DACore\Crud\AbstractCrudService;

class Person extends AbstractCrudService
{

	public function prepareDataToInsert(array $data)
    {
    	return $data;
    }

	public function prepareDataToUpdate(array $data)
	{
		var_dump($data);die;
		return $data;
	}
}