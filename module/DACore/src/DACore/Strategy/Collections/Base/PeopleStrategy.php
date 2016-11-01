<?php
namespace DACore\Strategy\Collections\Base;

use Doctrine\Common\Collections\ArrayCollection;
use Zend\Stdlib\Hydrator;

trait PeopleStrategy
{
	public function getPeopleReferences($key, $people, $field)
	{
		$arrPeople = new ArrayCollection();
		foreach ($people as $person) {
			if(isset($person['id'])) $personId = $person['id'];
			else continue;

			$entity = $this->em->getReference('DABase\Entity\Person', $personId);

			(new Hydrator\ClassMethods())->hydrate($person, $entity);

			if ($person) $arrPeople->add($person);

			else {
				self::addDataError($key, self::ERROR_INVALID_REFERENCE, $field, $personId);
				return false;
			}
		}
		return $arrPeople;
	}

	private function getContact($key, $person)
	{

		$entity = null;

		if (isset($person['id'])) {
			unset($person['createdAt']);
			unset($person['updatedAt']);
			$entity = $this->em->getReference('DACore\IEntities\Base\PersonInterface', $person['id']);
		}

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
			//die('aqui');
			//
			//var_dump(get_class($person['birthdate']));die;
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
					unset($doc['createdAt']);
					unset($doc['updatedAt']);
					if (empty($doc['images'])) unset($doc['images']);
					if (empty($doc['files'])) unset($doc['files']);

					return $doc;
				}, $person['documents']);

				$person['documents'] = $this->getDocumentsCollection($key, $person['documents'], 'person', $entity);
			}

		}

		if (static::hasErrors()) return false;

		return new \DABase\Entity\Person($person);
	}

	public function getContactCollection($key, $contacts, $entity)
	{
		if (!($this instanceof \DACore\Service\AbstractCrudService))
			throw new \Exception('TO USE DocumentsStrategy TRAIT NEED TO BE INSTANCE OF  DACore\Service\AbstractCrudService');

		$myTraits = class_uses($this);

		if (!in_array('DACore\Strategy\Core\DataCheckerStrategy', $myTraits)) {
			throw new \Exception('TO USE DocumentsStrategy TRAIT NEED TO HAVE DACore\Strategy\Core\DataCheckerStrategy');
		}

		$arrContacts = new ArrayCollection();
		$key = $key . '_contacts';

		if (!is_null($entity)) {

			$contactsCollection = $entity->getContacts();

			foreach($contacts as $contact) {
				if (is_numeric($contact)) {
					$contact = $this->em->getReference('DACore\IEntities\Base\PersonInterface', $contact);
					if (!$contact) continue;
				} else {
					$contact = $this->getContact($key, $contact);

					if (!$contact) continue;

					if (is_null($contact->getId())) {
						$contactsCollection->add($contact);
					} else {
						$contact = $this->em->merge($contact);
					}
				}

				$arrContacts->add($contact);
			}

			foreach($contactsCollection as $contact) {

				if (!$arrContacts->contains($contact)) {
					$contactsCollection->removeElement($contact);
					$this->em->remove($contact);
				}
			}

			return $contactsCollection;

		}

		foreach($contacts as $contact) {
			if (is_numeric($contact)) {
				$contact = $this->em->getReference('DACore\IEntities\Base\PersonInterface', $contact);
				if (!$contact) continue;
			} else {
				$contact = $this->getContact($key, $contact);
				if (!$contact) continue;
			}

			if ($contact) $arrContacts->add($contact);

		}

		return $arrContacts;
	}
}