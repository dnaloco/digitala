<?php
namespace DAUser\Controller;

use DACore\Crud\AbstractCrudRestController;

class UserRestController extends AbstractCrudRestController
{
	public function create($data)
	{
		$response = parent::create($data);

		$data = $response->getVariable('data');

		return $data;
	}
}