<?php 
namespace DABase\Service;

use DACore\Crud\AbstractCrudService;

class City extends AbstractCrudService
{
	public function getTotalRows()
	{
		$query = $this->em->createQuery('SELECT COUNT(u.id) FROM ' . $this->entity . ' u');
		$count = $query->getSingleScalarResult();
		return $count;
	}

	public function prepareDataToInsert(array $data)
    {
    	return $data;
    }

	public function prepareDataToUpdate(array $data)
	{
		return $data;
	}
}