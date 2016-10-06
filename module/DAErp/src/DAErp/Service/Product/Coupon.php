<?php 
namespace DAErp\Service\Product;

use DACore\Service\AbstractCrudService;

use DACore\Strategy\{DataCheckerStrategyInterface, DataCheckerStrategy};

class Coupon extends AbstractCrudService
implements
DataCheckerStrategyInterface
{
	use DataCheckerStrategy;

	public function prepareData(array $data)
	{
		$key = 'coupon';

		if (isset($data['startDate'])) {
			$mindate = new \DateTime();
			$mindate->modify('-1 year');

			$maxdate = new \DateTime();
			$maxdate->modify('+150 year');
			$data['startDate'] = static::checkDateBetween($key, $data['startDate'], 'startDate', $mindate, $maxdate);
		}

		if (isset($data['finishDate'])) {
			$mindate = new \DateTime();

			$maxdate = new \DateTime();
			$maxdate->modify('+150 year');
			$data['finishDate'] = static::checkDateBetween($key, $data['finishDate'], 'finishDate', $mindate, $maxdate);
		}

		if (isset($data['category'])) {
			$repoDepartment = $this->getAnotherRepository('DABase\Entity\CompanyCategory');
			if(isset($data['category']['id'])) {
				$data['category'] = $data['category']['id'];
			}
			$data['category'] = static::checkReference($key, $data['category'], 'category', $repoCompanyCategory);
		}

		var_dump('coupon data', $data );die;
	}
}