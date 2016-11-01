<?php 
namespace DAErp\Service\Product;

use DACore\Service\AbstractCrudService;

class Category extends AbstractCrudService
{
	public function prepareData(array $data)
	{
		$key = 'parent_product_category';

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