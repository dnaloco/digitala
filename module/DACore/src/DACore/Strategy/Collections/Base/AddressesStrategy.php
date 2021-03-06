<?php
namespace DACore\Strategy\Collections\Base;

use Doctrine\Common\Collections\ArrayCollection;

trait AddressesStrategy
{

	public function getAddress($key, $address)
	{

		$address = array_filter($address);

		if (!isset($address['type'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'address_type');
			return false;
		} else {
			$address['type'] = static::checkType($key, 'DABase\Enum\AddressType', $address['type']);
			if (!$address['type']) return false;
		}

		if (isset($address['city']) && is_numeric($address['city'])) {
			$cityId = $address['city'];
			$address['city'] = [];
			$address['city']['id'] = $cityId;
		}

		if (!isset($address['city']) && !isset($address['city']['id'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'city');
			return false;
		} else {
			$repoCity = $this->getAnotherRepository('DACore\IEntities\Base\CityInterface');
			$address['city'] = static::checkReference($key, $address['city']['id'], 'city', $repoCity);
			if (!$address['city']) return false;
		}

		if (!isset($address['address1'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'address1');
			return false;
		} else {
			$address['address1'] = static::checkString($key, $address['address1'], 'address1');
			if (!$address['address1']) return false;
		}

		if (isset($address['address2'])) {
			$address['address2'] = static::checkString($key, $address['address2'], 'address2');
			if (!$address['address1']) return false;
		}

		if (!isset($address['number'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'number');
			return false;
		} else {
			$address['number'] = static::checkNumber($key, $address['number']);
			if (!$address['number']) return false;
		}

		if (!isset($address['district'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'district');
			return false;
		} else {
			$address['district'] = static::checkString($key, $address['district'], 'district');
			if (!$address['district']) return false;
		}

		if (!isset($address['postalCode'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'postalCode');
			return false;
		} else {
			$address['postalCode'] = static::checkString($key, $address['postalCode'], 'postalCode');
			if (!$address['postalCode']) return false;
		}
		

		if (static::hasErrors()) return false;

		return new \DABase\Entity\Address($address);
	}

	public function getAddressesCollection($key, $addresses, $entity)
	{

		if (!($this instanceof \DACore\Service\AbstractCrudService))
			throw new \Exception('TO USE AddressesStrategy TRAIT NEED TO BE INSTANCE OF  DACore\Service\AbstractCrudService');

		$myTraits = class_uses($this);

		if (!in_array('DACore\Strategy\Core\DataCheckerStrategy', $myTraits)) {
			throw new \Exception('TO USE AddressesStrategy TRAIT NEED TO HAVE DACore\Strategy\Core\DataCheckerStrategy');
		}

		$arrAddresses = new ArrayCollection();
		$key = $key . '_addresses';

		if (!is_null($entity)) {

			$addressesCollection = $entity->getAddresses();

			foreach($addresses as $address) {
				$address = $this->getAddress($key, $address);

				if (!$address) continue;

				if (is_null($address->getId())) {
					$addressesCollection->add($address);
				} else {
					$address = $this->em->merge($address);
				}
				$arrAddresses->add($address);

			}

			foreach($addressesCollection as $address) {
				if (!$arrAddresses->contains($address)) {
					$addressesCollection->removeElement($address);
					$this->em->remove($address);
				}
			}


			return $addressesCollection;

		}

		foreach($addresses as $address) {

			$address = $this->getAddress($key, $address);

			if ($address) $arrAddresses->add($address);
		}


		return $arrAddresses;
	}
}