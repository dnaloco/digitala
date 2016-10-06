<?php 
namespace DAErp\Service\Product;

use DACore\Service\AbstractCrudService;
use DACore\Strategy\{DataCheckerStrategyInterface, DataCheckerStrategy};

class Feature extends AbstractCrudService
implements
DataCheckerStrategyInterface
{
	use DataCheckerStrategy;

	public function prepareData(array $data)
	{
		if (!isset($data['group'])) {
			$this->addDataError($key, static::ERROR_REQUIRED_FIELD, 'group');
			return $data;
		} else {
			if (isset($data['group']['id'])) $data['group'] = $data['group']['id'];
			$repo = $this->getAnotherRepository('DACore\Entity\Erp\Product\GroupInterface');
			$data['group'] = static::checkReference($key, $data['group'], 'group', $repo);
		}

		if (static::hasErrors()) {
			$data['errors'] = [];
			$data['errors'] = static::getErrors();
		}
		$data = array_filter($data);
		return $data;
	}
}