<?php
namespace DAUser\Service;

use DACore\Crud\AbstractCrudService;

class User extends AbstractCrudService
{
	use \DACore\Strategy\FilterStrategy;
	use \DACore\Strategy\ValidationStrategy;

	public function prepareDataToInsert(array $data)
	{
		$data['errors'] = [];

		// filtrando e validando o usuário
		if (isset($data['user'])) {
			$data['user'] = static::filterEmail($data['user']);
			$data['user'] = static::isValidEmail($data['user']);
			if (!$data['user']) {
				array_push($data['errors'], static::getValidationErrors());
			}
		} else {
			array_push($data['errors'], 'Data has no user field!');
		}

		if (!isset($data['password'])) {
			array_push($data['errors'], 'Data has no password field!');
		}

		if (isset($data['person'])) {
			$person = $data['person'];
			// name, gender, birthdate, description, photo, addresses, telephones, emails, socialNetworks, documents, website
		} else if (isset($data['company'])) {

		} else {
			array_push($data['errors'], 'Data has no person or company field!');
		}

	}

	public function prepareDataToUpdate(array $data)
	{

	}
}