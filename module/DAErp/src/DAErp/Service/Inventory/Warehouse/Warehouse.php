<?php 
namespace DAErp\Service\Inventory\Warehouse;

use DACore\Service\AbstractCrudService;

use Doctrine\Common\Collections\ArrayCollection;

use DACore\Strategy\Core\{DataCheckerStrategyInterface, DataCheckerStrategy};

use DACore\Strategy\Collections\Base\{
    AddressesInterface,AddressesStrategy
};

class Warehouse extends AbstractCrudService
implements
DataCheckerStrategyInterface,
AddressesInterface
{
	use DataCheckerStrategy;
	use AddressesStrategy;

	public function prepareData(array $data)
	{

		$data = array_filter($data);

		$key = 'warehouse';

		if (isset($data['address']) && isset($data['address']['id'])) {
			$address = $this->getReference('DACore\IEntities\Base\AddressInterface', $data['address']['id']);

			(new \Zend\Stdlib\Hydrator\ClassMethods)->hydrate($data['address'], $address);

			$this->em->merge($address);

			$data['address'] = $address;
		} else if (isset($data['address'])) {
			$data['address'] = static::getAddress($key, $data['address']);
		} else {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'warehouse_address');
		}

		if (isset($data['company']) && is_numeric($data['company'])) {
			$companyId = $data['company'];
			$data['company'] = [];
			$data['company']['id'] = $companyId;
		}

		if (isset($data['company']) && isset($data['company']['id'])) {
			$repoCompany = $this->getAnotherRepository('DACore\IEntities\Base\CompanyInterface');
			$data['company'] = static::checkReference($key, $data['company']['id'], 'company', $repoCompany);
		}

		//var_dump($data);die;

		if (static::hasErrors()) {
			$data['errors'] = [];
			$data['errors'] = static::getErrors();
		}
		$data = array_filter($data);

		//var_dump($data['name']);die;
		return $data;
	}
}