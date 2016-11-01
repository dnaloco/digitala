<?php
namespace DACore\Strategy\Collections\Base;

use Doctrine\Common\Collections\ArrayCollection;

trait SocialNetworksStrategy
{
	private $checkUnique = true;
	private function getSocialNetwork($key, $socialNetwork)
	{
		$repoSocial = $this->getAnotherRepository('DACore\IEntities\Base\SocialNetworkInterface');

		if (!isset($socialNetwork['type'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'soc_type');
			return false;
		} else {
			$socialNetwork['type'] = static::checkType($key, 'DABase\Enum\SocialType', $socialNetwork['type']);
			if (!$socialNetwork['type']) return false;
		}

		if (!isset($socialNetwork['address'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'address');
			return false;
		} else {
			$socialNetwork['address'] = static::checkUrl($key, $socialNetwork['address'], 'address');

			if ($this->checkUnique)
				$socialNetwork['address'] = $socialNetwork['address'] ? static::checkUnique($key, $socialNetwork['address'], 'address', $repoSocial) : false;

			if (!$socialNetwork['address']) return false;
		}

		if (static::hasErrors()) return false;

		return new \DABase\Entity\SocialNetwork($socialNetwork);
	}

	public function getSocialNetworksCollection($key, $socialNetworks, $entity)
	{

		if (!($this instanceof \DACore\Service\AbstractCrudService))
			throw new \Exception('TO USE SocialNetworksStrategy TRAIT NEED TO BE INSTANCE OF  DACore\Service\AbstractCrudService');

		$myTraits = class_uses($this);

		if (!in_array('DACore\Strategy\Core\DataCheckerStrategy', $myTraits)) {
			throw new \Exception('TO USE SocialNetworksStrategy TRAIT NEED TO HAVE DACore\Strategy\Core\DataCheckerStrategy');
		}

		$arrSocialNetworks = new ArrayCollection();
		$key = $key . '_socialNetworks';

		if (!is_null($entity)) {
			$this->checkUnique = false;
			$socialsCollection = $entity->getSocialNetworks();

			foreach($socialNetworks as $socialNetwork) {
				$socialNetwork = $this->getSocialNetwork($key, $socialNetwork);

				if (!$socialNetwork) continue;

				if (is_null($socialNetwork->getId())) {
					$socialsCollection->add($socialNetwork);
				} else {
					$socialNetwork = $this->em->merge($socialNetwork);
				}
				$arrSocialNetworks->add($socialNetwork);

			}

			foreach($socialsCollection as $socialNetwork) {
				if (!$arrSocialNetworks->contains($socialNetwork)) {
					$socialsCollection->removeElement($socialNetwork);
					$this->em->remove($socialNetwork);
				}
			}

			return $socialsCollection;

		}

		foreach($socialNetworks as $socialNetwork) {
			$socialNetwork = $this->getSocialNetwork($key, $socialNetwork);

			if ($socialNetwork) $arrSocialNetworks->add($socialNetwork);

		}

		return $arrSocialNetworks;
	}
}