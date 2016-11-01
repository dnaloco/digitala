<?php 
namespace DABase\Service;

use DACore\Service\AbstractCrudService;

class CompanyCategory extends AbstractCrudService
{
	public function prepareData(array $data)
	{
		if (isset($data['parent'])) {
			if (is_numeric($data['parent']))
				$data['parent'] = $this->getRepository()->find($data['parent']);
			else if (isset($data['parent']) && isset($data['parent']['id']))
				$data['parent'] = $this->getRepository()->find($data['parent']['id']);
		}
		return $data;
	}
}
