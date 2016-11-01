<?php
namespace DACore\Strategy\Collections\Base;

use Doctrine\Common\Collections\ArrayCollection;

trait GoodTagsStrategy
{
	public function getGoodTagsReferences($key, $goodTags, $entity)
	{
		if (!($this instanceof \DACore\Service\AbstractCrudService))
			throw new \Exception('TO USE TelephonesStrategy TRAIT NEED TO BE INSTANCE OF  DACore\Service\AbstractCrudService');

		$myTraits = class_uses($this);

		if (!in_array('DACore\Strategy\Core\DataCheckerStrategy', $myTraits))
			throw new \Exception('TO USE TelephonesStrategy TRAIT NEED TO HAVE DACore\Strategy\Core\DataCheckerStrategy');

		$arrGoodTags = new ArrayCollection();
		$key = $key . '_entities';


		if (!is_null($entity)) {

			$goodTagsCollection = $entity->getGoodTags();

			foreach($goodTags as $goodTag) {

				if (isset($goodTag['id']))
					$goodTag = $goodTag['id'];

				if (is_numeric($goodTag))
					$goodTag = $this->em->getReference('DABase\Entity\GoodTag', $goodTag);
				else
					continue;

				if (!$goodTag) continue;

				$goodTagsCollection->add($goodTag);

				$arrGoodTags->add($telephone);

			}

			foreach($goodTagsCollection as $goodTag) {
				if (!$arrGoodTags->contains($goodTag)) {
					$goodTagsCollection->removeElement($goodTag);
				}
			}

			return $goodTagsCollection;

		}

		foreach ($goodTags as $goodTag) {
			if (isset($goodTag['id'])) $goodTag = $goodTag['id'];

			if (is_numeric($goodTag))
				$goodTag = $this->em->getReference('DABase\Entity\GoodTag', $goodTag);
			else
				continue;

			if ($goodTag) $arrGoodTags->add($goodTag);
		}

		return $arrGoodTags;
	}
}