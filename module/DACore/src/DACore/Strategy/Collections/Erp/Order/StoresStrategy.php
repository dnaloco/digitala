<?php
namespace DACore\Strategy\Collections\Erp\Order;

use Doctrine\Common\Collections\ArrayCollection;

trait StoresStrategy
{

	private function getStore($key, $store)
	{
		unset($store['createdAt']);
		unset($store['updatedAt']);
		//$repoVideo = $this->getAnotherRepository('DACore\IEntities\Base\VideoInterface');

		if (!isset($store['product']) || !is_numeric($store['product'])) {
			static::addDataError($key, static::ERROR_UNIQUE_FIELD, 'product');
			return false;
		} else {
			$repoProduct = $this->em->getAnotherRepository('DACore\IEntities\Erp\Product\ProductInterface');
			$store['product'] = static::checkReference($key, $store['product'], 'product', $repoProduct);
			if (!$store['product']) return false;
		}

		if (static::hasErrors()) return false;

		return new \DABase\Entity\Video($video);
	}

	public function getStoresCollection($key, $stores, $entity)
	{
		if (!($this instanceof \DACore\Service\AbstractCrudService))
			throw new \Exception('TO USE VideosStrategy TRAIT NEED TO BE INSTANCE OF  DACore\Service\AbstractCrudService');

		$myTraits = class_uses($this);

		if (!in_array('DACore\Strategy\Core\DataCheckerStrategy', $myTraits)) {
			throw new \Exception('TO USE VideosStrategy TRAIT NEED TO HAVE DACore\Strategy\Core\DataCheckerStrategy');
		}

		$arrStores = new ArrayCollection();
		$key = $key . '_stores';

		if (!is_null($entity)) {
			$storesCollection = $entity->getStores();

			foreach($stores as $store) {
				$store = $this->getStores($key, $store);

				if (!$store) continue;

				if (is_null($store->getId())) {
					$storesCollection->add($store);
				} else {
					$store = $this->em->merge($store);
				}
				$arrStores->add($store);

			}

			foreach($storesCollection as $store) {
				if (!$arrStores->contains($store)) {
					$storesCollection->removeElement($store);
					$this->em->remove($store);
				}
			}

			return $storesCollection;

		}

		foreach($stores as $store) {
			$store = $this->getStores($key, $store);

			if ($store) $arrVideos->add($store);
		}

		return $arrStores;
	}
}