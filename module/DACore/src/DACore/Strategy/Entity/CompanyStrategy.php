<?php
namespace DACore\Strategy\Entity;

trait CompanyStrategy
{
	public function getCompany($key, $company, $hasParent = false)
	{
		if (!($this instanceof \DACore\Service\AbstractCrudService))
			throw new \Exception('TO USE AddressesStrategy TRAIT NEED TO BE INSTANCE OF  DACore\Service\AbstractCrudService');

		$myTraits = class_uses($this);

		$requiredTraits = [
			'DACore\Strategy\DataCheckerStrategy',
			'DACore\Strategy\Collections\AddressesStrategy',
			'DACore\Strategy\Collections\DocumentsStrategy',
			'DACore\Strategy\Collections\EmailsStrategy',
			'DACore\Strategy\Collections\SocialNetworksStrategy',
			'DACore\Strategy\Collections\TelephonesStrategy',
			'DACore\Strategy\Collections\PeopleStrategy',
			'DACore\Strategy\Collections\GoodTagsStrategy',
		];

		foreach($requiredTraits as $required) {
			if (!in_array($required, $myTraits)) {
				throw new \Exception('TO USE CompanyStrategy TRAIT NEED TO HAVE ' . $required);
			}
		}

		$company = array_filter($company);

		$entity = null;

		if (isset($company['id'])) {
			$entity = $this->em->getReference('DABase\Entity\Company', $company['id']);
		}


		// isso aqui não vai para o update obviamente
		if (isset($company['createdAt'])) unset($company['createdAt']);
		if (isset($company['updatedAt'])) unset($company['updatedAt']);

		if ($hasParent) $key = $key . '_company';
		else $key = 'company';

		if (!isset($company['type'])) {

		}

		if (!isset($company['type'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'type');
			return false;
		} else {
			$company['type'] = static::checkType($key, 'DACore\Enum\CompanyType', $company['type']);
			if (!$company['type']) return false;
		}

		if (!isset($company['tradingName'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'tradingName');
			return false;
		} else {
			$company['tradingName'] = static::checkNameWithSpecials($key, $company['tradingName']);
		}


		if (isset($company['companyName'])) {
			$company['companyName'] = static::checkNameWithSpecials($key, $company['companyName'], 'companyName');
		}

		if (isset($company['category'])) {
			$repoCompanyCategory = $this->getAnotherRepository('DABase\Entity\CompanyCategory');
			if(isset($company['category']['id'])) {
				$company['category'] = $company['category']['id'];
			}
			$company['category'] = static::checkReference($key, $company['category'], 'category', $repoCompanyCategory);
		}

		if (isset($company['website'])) {
			$company['website'] = static::checkUrl($key, $company['website'], 'website');
		}

		if (isset($company['telephones'])) {
			$company['telephones'] = static::getTelephonesCollection($key, $company['telephones'], $entity);
		}

		if (isset($company['documents'])) {
			$company['documents'] = static::getDocumentsCollection($key, $company['documents'], $entity);
		}

		if (isset($company['emails'])) {
			$company['emails'] = static::getEmailsCollection($key, $company['emails'], $entity);

		}

		if (isset($company['socialNetworks'])) {
			$company['socialNetworks'] = static::getSocialNetworksCollection($key, $company['socialNetworks'], $entity);
		}

		if (isset($company['contacts'])) {
			$company['contacts'] = static::getPeopleReferences($key, $company['contacts'], 'contacts');
		}

		if (isset($company['addresses'])) {
			$company['addresses'] = static::getAddressesCollection($key, $company['addresses'], $entity);
		}

		if (isset($company['description'])) {
			$company['description'] = static::checkString($key, $company['description'], 'description');
		}


		// TODO: FALTA CORRIGIR ISTO DAQUI
		if (isset($company['logo']) && isset($company['logo']['uploaded']) && isset($company['tradingName'])) {

			$imgData = [
				'title' => 'Logotipo de ' . $company['tradingName'],
				'author' => 'Logotipo da empresa',
				'licence' => static::checkType($key, 'DACore\Enum\Licence', 'Attribution-NonCommercial-NoDerivs'),
				'description' => 'Logotipo da empresa.',
				'name' => $company['tradingName'],
				'path' => './build/uploads/company/logos/',
			];

			$company['logo'] = $this->getUploadManager()->getPhoto($key, $company['logo']['uploaded'], $imgData);
		}

		if (isset($company['goodTags'])) {
			$company['goodTags'] = static::getGoodTagsReferences($key, $company['goodTags'], 'goodTags');

			if ($entity) {
				$entity->getGoodTags()->clear();
				$entity->setGoodTags($company['goodTags']);

			}
			//var_dump('I hava goodTags');die;
			
			//var_dump($company['goodTags']->count());die;
		}

		$company = array_filter($company);

		if (static::hasErrors()) {
			$company['errors'] = [];
			$company['errors'] = static::getErrors();
			return false;
		}
	
		//var_dump($asdas->getGoodTags()->count());die;
		if ($hasParent) return new \DABase\Entity\Company($company);

		return $company;
	}
}