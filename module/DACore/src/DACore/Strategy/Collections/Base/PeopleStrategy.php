<?php
namespace DACore\Strategy\Collections\Base;

use Doctrine\Common\Collections\ArrayCollection;

trait PeopleStrategy
{
	public function getPeopleReferences($key, $people, $field)
	{
		$arrPeople = new ArrayCollection();
		foreach ($people as $personId) {
			if(isset($personId['id'])) $personId = $personId['id'];
			$person = $this->em->getReference('DABase\Entity\Person', $personId);

			if ($person) $arrPeople->add($person);

			else {
				self::addDataError($key, self::ERROR_INVALID_REFERENCE, $field, $personId);
				return false;
			}
		}
		return $arrPeople;
	}
}