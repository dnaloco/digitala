<?php 
namespace DABase\Service;

use DACore\Service\AbstractCrudService;

class State extends AbstractCrudService
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