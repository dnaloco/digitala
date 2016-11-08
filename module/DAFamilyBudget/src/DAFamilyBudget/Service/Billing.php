<?php 
namespace DAFamilyBudget\Service;

use DACore\Service\AbstractCrudService;


use DACore\Strategy\Core\{DataCheckerStrategyInterface, DataCheckerStrategy};

class Billing extends AbstractCrudService
	implements
	DataCheckerStrategyInterface
{
	use DataCheckerStrategy;

	public function prepareData(array $data)
	{
		$data = array_filter($data);
		$key = 'fb_billing';

		if (isset($data['category']['id'])) {
			$data['category'] = $this->em->getReference('DACore\IEntities\FamilyBudget\CategoryInterface', $data['category']['id']);
		} else if (is_numeric(($data['category']))){
			$data['category'] = $this->em->getReference('DACore\IEntities\FamilyBudget\CategoryInterface', $data['category']);
		}

		if (!$data['category']) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'category');
		}

		if (!isset($data['paymentDate'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'paymentDate');
		} else {
			$data['paymentDate'] = static::checkDate($key, $data['paymentDate'], 'paymentDate');
		}

		if (!isset($data['paymentMethod'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'paymentMethod');
		} else {
			$data['paymentMethod'] = static::checkType($key, 'DAErp\Enum\PaymentMethod', $data['paymentMethod'], 'paymentMethod');
		}

		if (!isset($data['amount'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'amount');
		}

		if ($data['category']->getType() === 'income') {
			$data['amountIncome'] = $data['amount'];
		} else if ($data['category']->getType() === 'expense') {
			$data['amountOutcome'] = $data['amount'];
		} else {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'amount');
		}

		if (static::hasErrors()) {
			$data['errors'] = [];
			$data['errors'] = static::getErrors();
		}
		$data = array_filter($data);

		return $data;
	}
}