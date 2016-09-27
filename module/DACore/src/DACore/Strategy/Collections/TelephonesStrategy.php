<?php
namespace DACore\Strategy\Collections;

use Doctrine\Common\Collections\ArrayCollection;

trait TelephonesStrategy
{
	private function getTelephone($key, $telephone)
	{
		if (isset($telephone['anwserable'])) {
			$telephone['anwserable'] = static::checkNameWithSpecials($key, $telephone['anwserable'], 'anwserable');
			if (!$telephone['anwserable']) return false;

		}

		if (!isset($telephone['type'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'type');
			return false;
		} else {
			$telephone['type'] = static::checkType($key, 'DACore\Enum\TelephoneType', $telephone['type']);
			if (!$telephone['type']) return false;
		}

		if (!isset($telephone['number'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'number');
		} else {
			$telephone['number'] = static::checkNumber($key, $telephone['number']);

			if (!$telephone['number']) return false;
		}

		if (isset($telephone['mobileOperator'])) {
			$telephone['mobileOperator'] = static::checkType($key, 'DACore\Enum\MobileOperator', $telephone['mobileOperator']);
			if (!$telephone['mobileOperator']) return false;
		}

		if (isset($telephone['DDD'])) {
			$telephone['DDD'] = static::checkNumber($key, $telephone['DDD'], 'DDD');
			if (!$telephone['DDD']) return false;

		}

		if (isset($telephone['notes'])) {
			$telephone['notes'] = static::checkString($key, $telephone['DDD'], 'DDD');
			if (!$telephone['notes']) return false;

		}
		if (static::hasErrors()) return false;

		return new \DABase\Entity\Telephone($telephone);
	}

	public function getTelephonesCollection($key, $telephones, $entity)
	{
		if (!($this instanceof \DACore\Service\AbstractCrudService))
			throw new \Exception('TO USE TelephonesStrategy TRAIT NEED TO BE INSTANCE OF  DACore\Service\AbstractCrudService');

		$myTraits = class_uses($this);

		if (!in_array('DACore\Strategy\DataCheckerStrategy', $myTraits))
			throw new \Exception('TO USE TelephonesStrategy TRAIT NEED TO HAVE DACore\Strategy\DataCheckerStrategy');

		$arrTelephones = new ArrayCollection();
		$key = $key . '_telephones';


		if (!is_null($entity)) {

			$telephonesCollection = $entity->getTelephones();

			foreach($telephones as $telephone) {
				$telephone = $this->getTelephone($key, $telephone);

				if (!$telephone) continue;

				if (is_null($telephone->getId())) {
					$telephonesCollection->add($telephone);
				} else {

					$telEntity = $this->em->getReference('DABase\Entity\Telephone', $telephone->getId());
					if ($telephonesCollection->contains($telEntity)) {
						$this->em->merge($telephone);
					}
				}
			}

			$this->em->flush();
			return null;

		}

		foreach ($telephones as $telephone) {
			$telephone = $this->getTelephone($key, $telephone);

			if ($telephone) $arrTelephones->add($telephone);
		}

		return $arrTelephones;
	}
}