<?php
namespace DAUser\Controller;

use DACore\Crud\AbstractCrudRestController;

use DACore\Exception\HttpStatusCodeException;

class UserRestController extends AbstractCrudRestController
{
	/*public function create($data)
	{
		$response = parent::create($data);

		$variables = $response->getVariables();

		if (isset($variables['errors']) || !$variables['success']) {
            return $response;
        }

        $data = $variables['data'];
		if (isset($data['id'])) {
			$filteredUser = self::getFilteredUser($data);
		}

		$response->setVariable('data', $filteredUser);

		return $response;
	}*/

	public function create($data)
	{
		if (!isset($data['formToken'])) {
			$this->statusBadRequest('This form is invalid');
			throw new HttpStatusCodeException('This form is invalid.', 400);
		}

		parent::create($data);
	}

}