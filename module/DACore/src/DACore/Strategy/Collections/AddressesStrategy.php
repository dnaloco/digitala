<?php
namespace DACore\Strategy\Collections;

use Doctrine\Common\Collections\ArrayCollection;

trait AddressesStrategy
{
	public function getAddressesCollection($key,$addresses)
	{

		$arrAddresses = new ArrayCollection();
		$key = $key . '_addresses';

		foreach($addresses as $address) {

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

			$arrAddresses->add(new \DABase\Entity\Address($address));
		}


		return $arrAddresses;
	}
}