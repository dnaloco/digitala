<?php
namespace DAUser\Controller;

use DACore\Crud\AbstractCrudRestController;

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

}