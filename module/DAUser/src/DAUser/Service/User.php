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

		$hasValidationError = false;

		// user validation REQUIRED!
		if (!isset($data['user'])) {
			array_push($data['errors'], 'Data has no [user] field!');
		} else {
			$key = 'user';
			$data['user'] = static::filterEmail($data['user']);

			$data['user'] = static::validateEmail($key, $data['user']);

			if (!$data['user']) {
				$hasValidationError = true;
			} else {
				$repo = self::getRepository();
				$hasUser = $repo->findOneBy(array('user' => $data['user']));

				if ($hasUser) {
					array_push($data['errors'], 'Data [user] field already exist! Choose another one, please.', array('value' => $data['user']));
				}
			}
		}

		// password validation REQUIRED!
		if (!isset($data['password'])) {
			array_push($data['errors'], 'Data has no [password] field!');
		} else {
			$key = 'password';
			$data['password'] = static::validateMinMaxStringLength($key, $data['password'], 6, 32);

			if (!$data['password']) $hasValidationError = true;
		}

		// person or company REQUIRED!
		if (isset($data['person'])) {
			$person = $data['person'];
			// FIELDS OF PERSON: name, gender, birthdate, description, photo, addresses, telephones, emails, socialNetworks, documents, website

			// name validation REQUIRED
			if (!isset($person['name'])) {
				array_push($data['errors'], 'Data [person] has no [name] field!');
			} else {
				$key = 'person_name';
				$person['name'] = static::filterName($person['name']);

				$person['name'] = static::validateName($key, $person['name'], array('allowWhiteSpace' => true));
				$person['name'] = static::validateMinMaxStringLength($key, $person['name'], 6, 100);

				if (!$person['name']) $hasValidationError = true;
			}

			// gender validation not required.
			if (isset($person['gender'])) {
				$key = 'gender';
				try {
					$person['gender'] = new \DABase\Enum\EnumGenderType($person['gender']);
				} catch(\Exception $e) {
					array_push($data['errors'], 'Data [person] has an invalid [gender] field!', array('value' => $person['gender']));
				}
			}

		} else if (isset($data['company'])) {

		} else {
			array_push($data['errors'], 'Data has no [person] or [company] field!');
		}

		if ($hasValidationError) array_push($data['errors'], static::getValidationErrors());

		array_push($data['errors'], 'TESTE OK');

		return $data;
	}

	public function prepareDataToUpdate(array $data)
	{

	}
}