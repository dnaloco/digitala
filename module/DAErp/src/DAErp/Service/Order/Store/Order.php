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

		$data['claimant'] = $this->cache->getItem('user');
		$data['claimant'] = $this->em->getReference('DACore\IEntities\User\UserInterface', $data['claimant']->getId());
		if (!$data['claimant']) {
			static::addDataError($key, static::ERROR_WITHOUT_USER, 'claimant');
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

		//var_dump($data['supplier']->getId());die;


		if (isset($data['shippingType'])) {
			$data['shippingType'] = static::checkType($key, 'DAErp\Enum\ShippingType', $data['shippingType']);
		}

		if (isset($data['dateShipped'])) {
			$data['dateShipped'] = static::checkDate($key, $data['dateShipped'], 'dateShipped');
		}

		if (isset($data['expectedDeliveryDate'])) {
			$data['expectedDeliveryDate'] = static::checkDate($key, $data['expectedDeliveryDate'], 'expectedDeliveryDate');
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
//die('Criando ordem de estoque...');
		// var_dump(get_class($data['dateShipped']));
		
		/*if (isset("claimant"))*/

		if (static::hasErrors()) {
			$data['errors'] = [];
			$data['errors'] = static::getErrors();
		}
		$data = array_filter($data);

		return $data;
	}
}