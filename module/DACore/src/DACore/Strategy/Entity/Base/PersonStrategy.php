<?php
namespace DACore\Strategy\Entity\Base;

trait PersonStrategy
{
	public function getPerson($key, $person, $hasParent = false,  $userId = null)
	{
		if (!($this instanceof \DACore\Service\AbstractCrudService))
			throw new \Exception('TO USE PersonStrategy TRAIT NEED TO BE INSTANCE OF  DACore\Service\AbstractCrudService');

		$myTraits = class_uses($this);

		$requiredTraits = [
			'DACore\Strategy\DataCheckerStrategy',
			'DACore\Strategy\Collections\AddressesStrategy',
			'DACore\Strategy\Collections\DocumentsStrategy',
			'DACore\Strategy\Collections\EmailsStrategy',
			'DACore\Strategy\Collections\SocialNetworksStrategy',
			'DACore\Strategy\Collections\TelephonesStrategy'
		];

		foreach($requiredTraits as $required) {
			if (!in_array($required, $myTraits)) {
				throw new \Exception('TO USE PersonStrategy TRAIT NEED TO HAVE ' . $required);
			}
		}

		$entity = null;

		if (isset($person['id'])) {
			$entity = $this->em->getReference('DABase\Entity\Person', $person['id']);
		}

		// isso aqui não vai para o update obviamente
		if (isset($person['createdAt'])) unset($person['createdAt']);
		if (isset($person['updatedAt'])) unset($person['updatedAt']);

		if ($hasParent) $key = $key . '_person';
		else $key = 'person';

		if (!isset($person['name'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'name');
		} else {
			$person['name'] = static::checkNameWithSpecials($key, $person['name']);
		}

		if (isset($person['gender'])) {
			$person['gender'] = static::checkType($key, 'DABase\Enum\GenderType', $person['gender'], 'gender');
		}

		// birthdate
		if (isset($person['birthdate'])) {
			$mindate = new \DateTime();
			$mindate->modify('-150 year');

			$maxdate = new \DateTime();
			$maxdate->modify('-12 year');
			$person['birthdate'] = static::checkDateBetween($key, $person['birthdate'], 'birthdate', $mindate, $maxdate);
		}

		if (isset($person['description'])) {
			$person['description'] = static::checkString($key, $person['description'], 'description');
		}

		// TODO: FALTA CORRIGIR ISTO DAQUI
		if (isset($person['photo']) && isset($person['photo']['uploaded']) && isset($person['name'])) {

			if ($entity && !is_null($photo = $entity->getPhoto())) {
				$this->getUploadManager()->removeImage($photo);
				$this->em->remove($photo);
			}

			$imgData = [
				'title' => 'Foto de ' . $person['name'],
				'author' => 'Foto do proprietário da conta',
				'licence' => static::checkType($key, 'DABase\Enum\Licence', 'Attribution-NonCommercial-NoDerivs'),
				'description' => 'Imagem de foto do usuário fornecida pelo próprio.',
				'name' => $person['name'],
				'path' => './build/uploads/person/photos/',
			];



			$person['photo'] = $this->getUploadManager()->getImage($key, $person['photo']['uploaded'], $imgData, 'photo');

			$preupFolder = $this->getUploadManager()->getPreUploadFolder();

			$this->getUploadManager()->clearPath($preupFolder);
		}

		if (isset($person['photo']) && is_array($person['photo']) && !isset($person['photo']['uploaded'])) {
			if (empty($person['photo']) && $entity && !is_null($entity->getPhoto())) {
				$photo = $entity->getPhoto();
				$this->getUploadManager()->removeImage($photo);
				$this->em->remove($photo);
			} else
				$person['photo'] = $entity->getPhoto();
		}

		if (isset($person['emails'])) {
			if (empty($person['emails'])) {
				if ($entity) $entity->getEmails()->clear();
				unset($person['emails']);
			} else {
				$person['emails'] = static::getEmailsCollection($key, $person['emails'], $entity);
			}
		}

		if (isset($person['addresses'])) {
			if (empty($person['addresses'])) {
				if ($entity) $entity->getAddresses()->clear();
				unset($person['addresses']);
			} else {
				$person['addresses'] = static::getAddressesCollection($key, $person['addresses'], $entity);
			}

		}

		if (isset($person['telephones'])) {

			if (empty($person['telephones'])) {
				if ($entity) $entity->getTelephones()->clear();
				unset($person['telephones']);
			} else {
				$person['telephones'] = static::getTelephonesCollection($key, $person['telephones'], $entity);
			}
		}

		if (isset($person['socialNetworks'])) {

			if (empty($person['socialNetworks'])) {
				if ($entity) $entity->getSocialNetworks()->clear();
				unset($person['socialNetworks']);
			} else {
				$person['socialNetworks'] = static::getSocialNetworksCollection($key, $person['socialNetworks'], $entity);
			}
		}

		if (isset($person['documents'])) {

			if (empty($person['documents'])) {
				if ($entity) $entity->getDocuments()->clear();
				unset($person['documents']);
			} else {
				$person['documents'] = array_map(function($doc) {

					if (empty($doc['images'])) unset($doc['images']);
					if (empty($doc['files'])) unset($doc['files']);

					return $doc;
				}, $person['documents']);

				$person['documents'] = $this->getDocumentsCollection($key, $person['documents'], 'person', $entity);
			}

		}

		if ($hasParent) {
			if ($userId) {
				$userEntity = $this->em->getReference('DAUser\Entity\User', $userId);
				$person['user'] = $userEntity;
				//var_dump('USER', $userEntity->getId());die;
			} elseif($companyId) {
				$person['company'] = $companyId;
			}
		}

		$person = array_filter($person);

		if (static::hasErrors()) {
			$person['errors'] = [];
			$person['errors'] = static::getErrors();
			return false;
		}
		//die('DO NOT PROCEED');
		if ($hasParent) return new \DABase\Entity\Person($person);

		return $person;
	}
}