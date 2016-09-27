<?php
namespace DACore\Strategy\Entity;

trait PersonStrategy
{
	public function getPerson($key, $person, $hasParent = false)
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

		// limpar valores nulos e vazios
		$person = array_filter($person);

		$entity = null;

		if (isset($company['id'])) {
			$entity = $this->em->getReference('DABase\Entity\Person', $company['id']);
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
			$person['gender'] = static::checkType($key, 'DACore\Enum\GenderType', $person['gender']);
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

			$imgData = [
				'title' => 'Foto de ' . $person['name'],
				'author' => 'Foto do proprietário da conta',
				'licence' => static::checkType($key, 'DACore\Enum\Licence', 'Attribution-NonCommercial-NoDerivs'),
				'description' => 'Imagem de foto do usuário fornecida pelo próprio.',
				'name' => $person['name'],
				'path' => './build/uploads/person/photos/',
			];

			$person['photo'] = $this->getUploadManager()->getPhoto($key, $person['photo']['uploaded'], $imgData);
		}

		if (isset($person['emails'])) {
			$person['emails'] = static::getEmailsCollection($key, $person['emails'], $entity);

		}

		if (isset($person['addresses'])) {
			$person['addresses'] = static::getAddressesCollection($key, $person['addresses'], $entity);
		}

		if (isset($person['telephones'])) {
			$person['telephones'] = static::getTelephonesCollection($key, $person['telephones'], $entity);
		}

		if (isset($person['socialNetworks'])) {
			$person['socialNetworks'] = static::getSocialNetworksCollection($key, $person['socialNetworks'], $entity);
		}

		if (isset($person['documents'])) {
			$person['documents'] = static::getDocumentsCollection($key, $person['documents'], $entity);
		}

		$person = array_filter($person);

		if (static::hasErrors()) {
			$person['errors'] = [];
			$person['errors'] = static::getErrors();
			return false;
		}

		if ($hasParent) return new \DABase\Entity\Person($person);

		return $person;
	}
}