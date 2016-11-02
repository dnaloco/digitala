<?php 
namespace DAErp\Service\Inventory\Warehouse;

use DACore\Service\AbstractCrudService;

use Doctrine\Common\Collections\ArrayCollection;

use DACore\Strategy\Core\{DataCheckerStrategyInterface, DataCheckerStrategy};

class Storage extends AbstractCrudService
implements
DataCheckerStrategyInterface
{
	use DataCheckerStrategy;

	public function insert(array $data)
	{
		$entity = parent::insert($data);

		if ($entity instanceof $this->entity) {

			$store = $entity->getStore();

			if (!$store->getStorages()->contains($entity)) {
				$store->getStorages()->add($entity);
				$this->merge($store);
			}

			$this->em->flush();
		}

		return $entity;
	}

	public function update(array $data) {
		$entity = parent::update($data);

		if ($entity instanceof $this->entity) {

			$store = $entity->getStore();

			if (!$store->getStorages()->contains($entity)) {
				$store->getStorages()->add($entity);
				$this->merge($store);
			}

			$this->em->flush();
		}

		return $entity;
	}

	public function prepareData(array $data)
	{

		$data = array_filter($data);

		$key = 'warehouse';

		if (isset($data['store']) && is_numeric($data['store'])) {
			$storeId = $data['store'];
			$data['store'] = [];
			$data['store']['id'] = $storeId;
		}

		if (isset($data['store']) && isset($data['store']['id'])) {
			$repoStore = $this->getAnotherRepository('DACore\IEntities\Erp\Order\Store\StoreInterface');
			$data['store'] = static::checkReference($key, $data['store']['id'], 'store', $repoStore);
		}

		if (!isset($data['store']) && !($data['store'] instanceof \DACore\IEntities\Erp\Order\Store\StoreInterface)) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'store');
		} else {
			$orderIn = $data['store']->getStoreOrder();
			$data['orderIn'] = $orderIn;
		}

		if (!isset($data['place'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'place');
		} else if (isset($data['place']) && is_numeric($data['place'])) {
			$placeId = $data['place'];
			$data['place'] = [];
			$data['place']['id'] = $placeId;
		}

		if (isset($data['place']) && isset($data['place']['id'])){
			$repoPlace = $this->getAnotherRepository('DACore\IEntities\Erp\Inventory\Warehouse\PlaceInterface');
			$data['place'] = static::checkReference($key, $data['place']['id'], 'place', $repoPlace);
		}



		//die('OK...');
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