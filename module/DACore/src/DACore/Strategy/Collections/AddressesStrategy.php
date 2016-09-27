<?php
namespace DACore\Strategy\Collections;

use Doctrine\Common\Collections\ArrayCollection;

trait AddressesStrategy
{

	public function getAddress($address)
	{
		if (!isset($address['type'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'type');
			return false;
		} else {
			$address['type'] = static::checkType($key, 'DACore\Enum\AddressType', $address['type']);
			if (!$address['type']) return false;
		}



		if (!isset($address['city']) && !isset($address['city']['id'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'city');
			return false;
		} else {
			$repoCity = $this->getAnotherRepository('DABase\Entity\City');
			$address['city'] = static::checkEntityById($key, $address['city']['id'], 'city', $repoCity);
			if (!$address['city']) return false;
		}

		if (!isset($address['address1'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'address1');
			return false;
		} else {
			$address['address1'] = static::checkString($key, $address['address1']);
			if (!$address['address1']) return false;
		}

		if (isset($address['address2'])) {
			$address['address2'] = static::checkString($key, $address['address2']);
			if (!$address['address1']) return false;
		}

		if (!isset($address['number'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'number');
			return false;
		} else {
			$address['number'] = static::checkNumber($key, $address['number']);
			if (!$address['number']) return false;
		}

		if (!isset($address['residentialArea'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'residentialArea');
			return false;
		} else {
			$address['residentialArea'] = static::checkString($key, $address['residentialArea']);
			if (!$address['residentialArea']) return false;
		}

		if (!isset($address['postalCode'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'postalCode');
			return false;
		} else {
			$address['postalCode'] = static::checkString($key, $address['postalCode']);
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

		if (!in_array('DACore\Strategy\DataCheckerStrategy', $myTraits)) {
			throw new \Exception('TO USE AddressesStrategy TRAIT NEED TO HAVE DACore\Strategy\DataCheckerStrategy');
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

					$addressEntity = $this->em->getReference('DABase\Entity\Address', $address->getId());
					if ($addressesCollection->contains($addressEntity)) {
						$this->em->merge($address);
					}
				}
			}

			$this->em->flush();
			return null;

		}

		foreach($addresses as $address) {

			$address = $this->getAddress($key, $address);

			if ($address) $arrAddresses->add($address);
		}


		return $arrAddresses;
	}
}