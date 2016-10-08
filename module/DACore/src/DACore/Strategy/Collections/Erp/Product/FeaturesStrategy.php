<?php
namespace DACore\Strategy\Collections\Erp\Product;

use Doctrine\Common\Collections\ArrayCollection;

trait FeaturesStrategy
{
	public function getFeaturesReferences($key, $features, $field)
	{
		$arrFeatures = new ArrayCollection();
		foreach ($features as $featureId) {
			if(isset($featureId['id'])) $featureId = $featureId['id'];
			$feature = $this->em->getReference('DACore\IEntities\Erp\Product\FeatureInterface', $featureId);

			if ($feature) $arrFeatures->add($feature);

			else {
				self::addDataError($key, self::ERROR_INVALID_REFERENCE, $field, $featureId);
				return false;
			}
		}
		return $arrFeatures;
	}
}