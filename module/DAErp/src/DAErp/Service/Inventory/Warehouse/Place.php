<?php 
namespace DAErp\Service\Inventory\Warehouse;

use DACore\Service\AbstractCrudService;

use Doctrine\Common\Collections\ArrayCollection;

use DACore\Strategy\Core\{DataCheckerStrategyInterface, DataCheckerStrategy};

class Place extends AbstractCrudService
implements
DataCheckerStrategyInterface
{
	use DataCheckerStrategy;

	public function insert(array $data)
	{
		$entity = parent::insert($data);


		if ($entity instanceof $this->entity) {

			$warehouse = $entity->getWarehouse();

			if (!$warehouse->getPlaces()->contains($entity)) {
				$warehouse->getPlaces()->add($entity);
				$this->em->merge($warehouse);
			}

			$this->em->flush();

		}

		return $entity;
	}

	public function prepareData(array $data)
	{
		$data = array_filter($data);

		$key = 'warehouse';

		if (isset($data['warehouse']) && is_numeric($data['warehouse'])) {
			$warehouseId = $data['warehouse'];
			$data['warehouse'] = [];
			$data['warehouse']['id'] = $warehouseId;
		}

		if (isset($data['warehouse']) && isset($data['warehouse']['id'])) {
			$repoWarehouse = $this->getAnotherRepository('DACore\IEntities\Erp\Inventory\Warehouse\WarehouseInterface');
			$data['warehouse'] = static::checkReference($key, $data['warehouse']['id'], 'warehouse', $repoWarehouse);
		}

		if (static::hasErrors()) {
			$data['errors'] = [];
			$data['errors'] = static::getErrors();
		}
		$data = array_filter($data);

		//var_dump($data['name']);die;
		return $data;
	}
}