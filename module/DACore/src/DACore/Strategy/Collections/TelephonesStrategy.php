<?php
namespace DACore\Strategy\Collections;

use Doctrine\Common\Collections\ArrayCollection;

trait TelephonesStrategy
{
	public function getTelephonesCollection($key, $telephones)
	{

		$arrTelephones = new ArrayCollection();
		$key = $key . '_telephones';

		foreach ($telephones as $telephone) {
			//	fields: answerable, type, number, mobileOperator, DDD, notes

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
				
			$arrTelephones->add(new \DABase\Entity\Telephone($telephone));
		}

		return $arrTelephones;
	}
}