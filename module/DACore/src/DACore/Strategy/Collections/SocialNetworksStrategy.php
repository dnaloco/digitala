<?php
namespace DACore\Strategy\Collections;

use Doctrine\Common\Collections\ArrayCollection;

trait SocialNetworksStrategy
{
	private $checkUnique = true;
	public function getSocialNetwork($key, $socialNetwork)
	{
		$repoSocial = $this->getAnotherRepository('DABase\Entity\SocialNetwork');

		if (!isset($socialNetwork['type'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'type');
			return false;
		} else {
			$socialNetwork['type'] = static::checkType($key, 'DACore\Enum\SocialType', $socialNetwork['type']);
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

		if (!in_array('DACore\Strategy\DataCheckerStrategy', $myTraits)) {
			throw new \Exception('TO USE SocialNetworksStrategy TRAIT NEED TO HAVE DACore\Strategy\DataCheckerStrategy');
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

					$socialEntity = $this->em->getReference('DABase\Entity\SocialNetwork', $socialNetwork->getId());
					if ($socialsCollection->contains($socialEntity)) {
						$this->em->merge($socialNetwork);
					}
				}
			}

			$this->em->flush();
			return null;

		}

		foreach($socialNetworks as $socialNetwork) {
			$socialNetwork = $this->getSocialNetwork($key, $socialNetwork);

			if ($socialNetwork) $arrSocialNetworks->add($socialNetwork);

		}

		return $arrSocialNetworks;
	}
}