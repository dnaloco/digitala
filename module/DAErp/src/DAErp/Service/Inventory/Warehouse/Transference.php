<?php 
namespace DAErp\Service\Inventory\Warehouse;

use DACore\Service\AbstractCrudService;

use DACore\Strategy\Core\{DataCheckerStrategyInterface, DataCheckerStrategy};

class Transference extends AbstractCrudService
implements
DataCheckerStrategyInterface
{
	use DataCheckerStrategy;

	public function prepareData(array $data)
	{
		$data = array_filter($data);

		$key = 'transference';

		if (!isset($data['quantity'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'quantity');
		}

		if (!isset($data['fromStorage'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'fromStorage');
		} else if (isset($data['fromStorage']) && is_numeric($data['fromStorage'])) {
			$storageId = $data['fromStorage'];
			$data['fromStorage'] = [];
			$data['fromStorage']['id'] = $storageId;
		}

		if (isset($data['fromStorage']) && isset($data['fromStorage']['id'])) {
			$repoStorage = $this->getAnotherRepository('DACore\IEntities\Erp\Inventory\Warehouse\StorageInterface');
			$data['fromStorage'] = static::checkReference($key, $data['fromStorage']['id'], 'fromStorage', $repoStorage);
		}

		if (!isset($data['toStorage'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'toStorage');
		} else if (isset($data['toStorage']) && is_numeric($data['transference_toStorage'])) {
			$storageId = $data['toStorage'];
			$data['toStorage'] = [];
			$data['toStorage']['id'] = $storageId;
		}

		if (isset($data['toStorage']) && isset($data['toStorage']['id'])) {
			$repoStorage = $this->getAnotherRepository('DACore\IEntities\Erp\Inventory\Warehouse\StorageInterface');
			$data['toStorage'] = static::checkReference($key, $data['toStorage']['id'], 'toStorage', $repoStorage);
			$data['toStorage']->setQuantity($data['quantity']);
			$this->em->merge($data['toStorage']);
		}

		if (isset($data['toStorage']) && $data['fromStorage'] && isset($data['quantity'])) {

			if (!isset($data['toStorage']['place'])) {
				static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'transference_toStorage_place');
			} else {
				$data['toStorage']['store'] =  $data['fromStorage']->getStore();
				$data['toStorage']['orderIn'] =  $data['fromStorage']->getOrderIn();
				$data['toStorage']['quantity'] = $data['quantity'];

				if (is_numeric($data['toStorage']['place'])) {
					$repoPlace = $this->getAnotherRepository('DACore\IEntities\Erp\Inventory\Warehouse\PlaceInterface');
					$data['toStorage']['place'] = static::checkReference($key, $data['toStorage']['place'], 'place', $repoPlace);

					if ($data['toStorage']['place']) {
						$data['toStorage'] = new \DAErp\Entity\Inventory\Warehouse\Storage($data['toStorage']);

						$this->em->persist($data['toStorage']);

						$store = $data['fromStorage']->getStore();;
						$store->getStorages()->add($data['toStorage']);

						$this->em->merge($store);

					}
				}


			}

		}

		if (static::hasErrors()) {
			$data['errors'] = [];
			$data['errors'] = static::getErrors();
		}
		$data = array_filter($data);

		//var_dump($data['name']);die;
		return $data;

		//var_dump($data);
		//die('ok');
	}
}