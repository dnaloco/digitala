<?php
namespace DAErp\Service\Order\Store;

use DACore\Service\AbstractCrudService;
use Doctrine\Common\Collections\ArrayCollection;

use DACore\Strategy\Core\{DataCheckerStrategyInterface, DataCheckerStrategy};

use DACore\Strategy\Collections\Erp\Order\{
    StoresInterface,StoresStrategy
};

use DACore\Strategy\Collections\Erp\Financial\{
    PaymentsInterface,PaymentsStrategy
};

use DACore\Aware\ApcCacheAwareInterface;

class Order extends AbstractCrudService
	implements
	DataCheckerStrategyInterface,
    StoresInterface,
    ApcCacheAwareInterface,
    PaymentsInterface
{
	use DataCheckerStrategy;
	use StoresStrategy;
	use PaymentsStrategy;

	private $cache;

	public function getCache($cache = null)
    {
        if(is_null($this->cache)) {
            $this->cache = $cache;
        }

        return $this->cache;
    }

    public function insert(array $data)
	{
		$entity = parent::insert($data);



		if ($entity instanceof $this->entity) {

			//var_dump($entity->getPayments()->count());die;
			//


			foreach($entity->getPayments() as $payment) {
				$payment->setOrder($entity);
				$this->em->merge($payment);
			}

			if (!is_null($entity->getSupplier())) {
				$stores = $entity->getStores();
				$supplier = $entity->getSupplier();

				foreach ($stores as $store) {
					$product = $store->getProduct();

					$store->setStoreOrder($entity);
					$this->em->merge($store);

					if (!$supplier->getProducts()->contains($product)) {
						$supplier->getProducts()->add($product);
					}

					if (!$product->getSuppliers()->contains($supplier)) {
						$product->getSuppliers()->add($supplier);
					}

					$this->em->merge($product);
				}
				$this->em->merge($supplier);

			}

			$this->em->flush();

		}

		return $entity;
	}

	public function update(array $data)
	{
		$entity = parent::update($data);



		if ($entity instanceof $this->entity) {



			//var_dump($entity->getPayments()->count());die;

			foreach($entity->getPayments() as $payment) {
				$payment->setOrder($entity);
				$this->em->merge($payment);
			}

			if (!is_null($entity->getSupplier())) {
				$stores = $entity->getStores();
				$supplier = $entity->getSupplier();

				foreach ($stores as $store) {
					$product = $store->getProduct();

					if (!$supplier->getProducts()->contains($product)) {
						$supplier->getProducts()->add($product);
					}

					if (!$product->getSuppliers()->contains($supplier)) {
						$product->getSuppliers()->add($supplier);
					}

					$this->em->merge($product);
				}
				$this->em->merge($supplier);

			}

			$this->em->flush();

		}

		return $entity;
	}

	public function prepareData(array $data)
	{

		unset($data['createdAt']);
		unset($data['updatedAt']);

		$data = array_filter($data);
		$key = 'store_order';

		$entity = null;

		if (isset($data['id'])) {
			$entity = $this->em->getReference('DACore\IEntities\Erp\Order\Store\OrderInterface', $data['id']);
		}
		
		if (isset($data['claimant']['id'])) {
			$data['claimant'] = $this->em->getReference('DACore\IEntities\User\UserInterface', $data['claimant']['id']);
		} else {
			$data['claimant'] = $this->cache->getItem('user');
			$data['claimant'] = $this->em->getReference('DACore\IEntities\User\UserInterface', $data['claimant']->getId());
		}

		if (!$data['claimant']) {
			static::addDataError($key, static::ERROR_WITHOUT_USER, 'claimant');
		}

		if (isset($data['receiver']) && is_numeric($data['receiver'])) {
			$receiverId = $data['receiver'];
			$data['receiver'] = [];
			$data['receiver']['id'] = $receiverId;
		}

		if (isset($data['receiver']) && isset($data['receiver']['id'])) {
			$repoUser = $this->getAnotherRepository('DACore\IEntities\User\UserInterface');
			$data['shipper'] = static::checkReference($key, $data['receiver']['id'], 'receiver', $repoUser);
		}

		if (isset($data['appraiser']) && is_numeric($data['appraiser'])) {
			$appraiserId = $data['appraiser'];
			$data['appraiser'] = [];
			$data['appraiser']['id'] = $appraiserId;
		}

		if (isset($data['appraiser']) && isset($data['appraiser']['id'])) {
			$repoUser = $this->getAnotherRepository('DACore\IEntities\User\UserInterface');
			$data['appraiser'] = static::checkReference($key, $data['appraiser']['id'], 'appraiser', $repoUser);
		}

		if (isset($data['dateApproved'])) {
			$data['dateApproved'] = static::checkDate($key, $data['dateApproved'], 'dateApproved');
		}


		if (isset($data['shipper']) && is_numeric($data['shipper'])) {
			$shipperId = $data['shipper'];
			$data['shipper'] = [];
			$data['shipper']['id'] = $shipperId;
		}

		if (isset($data['shipper']) && isset($data['shipper']['id'])) {
			$repoShipper = $this->getAnotherRepository('DACore\IEntities\Erp\Shipper\ShipperInterface');
			$data['shipper'] = static::checkReference($key, $data['shipper']['id'], 'shipper', $repoShipper);
		}

		if (isset($data['supplier']) && is_numeric($data['supplier'])) {
			$supplierId = $data['supplier'];
			$data['supplier'] = [];
			$data['supplier']['id'] = $supplierId;
		}

		if (isset($data['supplier']) && isset($data['supplier']['id'])) {
			$repoSupplier = $this->getAnotherRepository('DACore\IEntities\Erp\Supplier\SupplierInterface');
			$data['supplier'] = static::checkReference($key, $data['supplier']['id'], 'supplier', $repoSupplier);
		}

		if (isset($data['shippingType'])) {
			$data['shippingType'] = static::checkType($key, 'DAErp\Enum\ShippingType', $data['shippingType']);
		}

		if (isset($data['dateShipped'])) {
			$data['dateShipped'] = static::checkDate($key, $data['dateShipped'], 'dateShipped');
		}

		if (isset($data['expectedDeliveryDate'])) {
			$data['expectedDeliveryDate'] = static::checkDate($key, $data['expectedDeliveryDate'], 'expectedDeliveryDate');
		}

		if (isset($data['dateDelivery'])) {
			$data['dateDelivery'] = static::checkDate($key, $data['dateDelivery'], 'dateDelivery');
		}

		if (isset($data['discountType'])) {
			$data['discountType'] = static::checkType($key, 'DAErp\Enum\DiscountType', $data['discountType']);
		}

		if (!isset($data['stores'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'stores');
		} else {
			if (empty($data['stores'])) {
				static::addDataError($key, static::ERROR_EMPTY_FIELD, 'stores');
			} else {
				$data['stores'] = static::getStoresCollection($key, $data['stores'], $entity);
			}
		}

		if (isset($data['payments'])) {
			if (empty($data['payments'])) {
				static::addDataError($key, static::ERROR_EMPTY_FIELD, 'payments');
			} else {
				$data['payments'] = static::getPaymentsCollection($key, $data['payments'], $entity);
			}
		}

		if (static::hasErrors()) {
			$data['errors'] = [];
			$data['errors'] = static::getErrors();
		}
		$data = array_filter($data);

		//die('OK ATÉ AQUI');
		//die('debuging');

		return $data;
	}
}