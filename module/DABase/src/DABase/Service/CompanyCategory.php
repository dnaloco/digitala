<?php 
namespace DABase\Service;

use DACore\Service\AbstractCrudService;

class CompanyCategory extends AbstractCrudService
{
	public function prepareData(array $data)
	{
		$key = 'parent_company_category';

		if (isset($data['parent'])) {

			if (isset($data['parent']['id']))
				$data['parent'] = $data['parent']['id'];

			if (is_numeric($data['parent']))
				$data['parent'] = $this->getRepository()->find($data['parent']);
			else
				self::addDataError($key, self::ERROR_INVALID_REFERENCE, 'parent', $data['parent']);;
		}

		return $data;
	}
}
