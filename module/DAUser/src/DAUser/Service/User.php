<?php
namespace DAUser\Service;

class User extends AbstractCrudService
{
	use DACore\Strategy\FilterStrategy;
	use DACore\Strategy\ValidationStrategy;

	public static function prepareDataToInsert($data)
	{

		if (isset($data['user'])) {
			$data['user'] = static::filterEmail($data['user']);
			$data['user'] = static::isValidEmail($data['user']);
			if (!data['user']) {
				throw new \Exception(json_encode(static::getErrors()));
			}
		} else {
			throw new \Exception('Data has no user field!');
		}
	}

	public static function prepareDataToUpdate($data)
	{

	}
}