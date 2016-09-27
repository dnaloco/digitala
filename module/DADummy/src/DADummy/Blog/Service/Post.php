<?php
namespace DADummy\Blog\Service;

use DACore\Service\AbstractCrudService;

class Post extends AbstractCrudService
{
	public function prepareDataToInsert(array $data) : array
	{
		return $data;
	}

	public function prepareDataToUpdate(array $data) : array
	{
		return $data;
	}
}