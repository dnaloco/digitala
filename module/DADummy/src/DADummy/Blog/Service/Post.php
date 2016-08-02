<?php
namespace DADummy\Blog\Service;

use DACore\Crud\{AbstractCrudService, PrepareDataInterface};

class Post extends AbstractCrudService implements PrepareDataInterface
{
	public function __construct ($em)
	{
		$this->entity = 'DADummy\Blog\Entity\Post';
		parent::__construct($em);

	}

	public function insert(array $data)
	{
		$data = $this->prepareDataToInsert($data);
		return parent::insert($data);
	}

	public function update(array $data)
	{
		$data = $this->prepareDataToUpdate($data);
		return parent::update($data);
	}

	public function prepareDataToInsert(array $data) : array
	{
		return $data;
	}

	public function prepareDataToUpdate(array $data) : array
	{
		return $data;
	}
}