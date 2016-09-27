<?php
namespace DACore\Strategy\Collections;

use Doctrine\Common\Collections\ArrayCollection;

trait SocialNetworksStrategy
{
	public function getSocialNetwork($key, $socialNetwork, $repoSocial)
	{
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

			$socialNetwork['address'] = $socialNetwork['address'] ? static::checkUnique($key, $socialNetwork['address'], 'address', $repoSocial) : false;

			if (!$socialNetwork['address']) return false;
		}

		if (static::hasErrors()) return false;

		return new \DABase\Entity\SocialNetwork($socialNetwork);
	}

	public function getSocialNetworksCollection($key, $socialNetworks, $repoSocial)
	{
		$myTraits = class_uses($this);

		if (!in_array('DACore\Strategy\DataCheckerStrategy', $myTraits)) {
			throw new \Exception('TO USE SocialNetworksStrategy TRAIT NEED TO HAVE DACore\Strategy\DataCheckerStrategy');
		}

		$arrSocialNetworks = new ArrayCollection();
		$key = $key . '_socialNetworks';

		foreach($socialNetworks as $socialNetwork) {
			$socialNetwork = $this->getSocialNetwork($key, $socialNetwork, $repoSocial);

			if ($socialNetwork) $arrSocialNetworks->add($socialNetwork);

		}

		return $arrSocialNetworks;
	}
}