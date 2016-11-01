<?php
namespace DACore\Strategy\Collections\Base;

use Doctrine\Common\Collections\ArrayCollection;

trait GoodTagsStrategy
{
	public function getGoodTagsReferences($key, $goodTags, $field)
	{
		$arrGoodTags = new ArrayCollection();
		foreach ($goodTags as $goodTagId) {
			if (isset($goodTagId['id'])) $goodTagId = $goodTagId['id'];
			$goodTag = $this->em->getReference('DABase\Entity\GoodTag', $goodTagId);

			if ($goodTag) $arrGoodTags->add($goodTag);

			else {
				self::addDataError($key, self::ERROR_INVALID_REFERENCE, $field, $goodTagId);
				return false;
			}
		}
		return $arrGoodTags;
	}
}