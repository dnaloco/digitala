<?php
namespace DACore\Strategy\Entity\Base;

use Zend\Stdlib\Hydrator;

trait CompanyStrategy
{
	public function getCompany($key, $company, $hasParent = false, $userId = null)
	{
		if (!($this instanceof \DACore\Service\AbstractCrudService))
			throw new \Exception('TO USE AddressesStrategy TRAIT NEED TO BE INSTANCE OF  DACore\Service\AbstractCrudService');

		$myTraits = class_uses($this);

		$requiredTraits = [
			'DACore\Strategy\Core\DataCheckerStrategy',
			'DACore\Strategy\Collections\Base\AddressesStrategy',
			'DACore\Strategy\Collections\Base\DocumentsStrategy',
			'DACore\Strategy\Collections\Base\EmailsStrategy',
			'DACore\Strategy\Collections\Base\SocialNetworksStrategy',
			'DACore\Strategy\Collections\Base\TelephonesStrategy',
			'DACore\Strategy\Collections\Base\PeopleStrategy',
			'DACore\Strategy\Collections\Base\GoodTagsStrategy',
		];

		foreach($requiredTraits as $required) {
			if (!in_array($required, $myTraits)) {
				throw new \Exception('TO USE CompanyStrategy TRAIT NEED TO HAVE ' . $required);
			}
		}

		$company = array_filter($company);

		$entity = null;

		//var_dump($company['id']);die;

		if (isset($company['id'])) {
			$entity = $this->em->getReference('DACore\IEntities\Base\CompanyInterface', $company['id']);
		}


		// isso aqui não vai para o update obviamente
		if (isset($company['createdAt'])) unset($company['createdAt']);
		if (isset($company['updatedAt'])) unset($company['updatedAt']);

		if ($hasParent) $key = $key . '_company';
		else $key = 'company';

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
			$repoCompanyCategory = $this->getAnotherRepository('DACore\IEntities\Base\CompanyCategoryInterface');
			if(isset($company['category']['id'])) {
				$company['category'] = $company['category']['id'];
			}
			$company['category'] = static::checkReference($key, $company['category'], 'category', $repoCompanyCategory);
		}

		if (isset($company['website'])) {
			$company['website'] = static::checkUrl($key, $company['website'], 'website');
		}

		if (isset($company['telephones'])) {

			if (empty($company['telephones'])) {
				if ($entity) $entity->getTelephones()->clear();
				unset($company['telephones']);
			} else {
				$company['telephones'] = static::getTelephonesCollection($key, $company['telephones'], $entity);
			}
		}


		if (isset($company['documents'])) {

			if (empty($company['documents'])) {
				if ($entity) $entity->getDocuments()->clear();
				unset($company['documents']);
			} else {
				$company['documents'] = array_map(function($doc) {
					unset($doc['createdAt']);
					unset($doc['updatedAt']);
					if (empty($doc['images'])) unset($doc['images']);
					if (empty($doc['files'])) unset($doc['files']);

					return $doc;
				}, $company['documents']);

				$company['documents'] = $this->getDocumentsCollection($key, $company['documents'], 'documents', $entity);
			}

		}

		if (isset($company['emails'])) {
			if (empty($company['emails'])) {
				if ($entity) $entity->getEmails()->clear();
				unset($company['emails']);
			} else {
				$company['emails'] = static::getEmailsCollection($key, $company['emails'], $entity);
			}
		}

		if (isset($company['socialNetworks'])) {

			if (empty($company['socialNetworks'])) {
				if ($entity) $entity->getSocialNetworks()->clear();
				unset($company['socialNetworks']);
			} else {
				$company['socialNetworks'] = static::getSocialNetworksCollection($key, $company['socialNetworks'], $entity);
			}
		}

		//var_dump($company['contacts']);die;

		if (isset($company['contacts'])) {
			if (empty($company['contacts'])) {
				if ($entity) $entity->getContacts()->clear();
				unset($company['contacts']);
			} else {
				/*foreach ($company['contacts'] as $contact) {
					if (is_numeric($contact)) {
						$contact = $this->em->getReference('DACore\IEntities\Base\PersonInterface', $contact);
					}
				}*/
				$company['contacts'] = static::getContactCollection($key, $company['contacts'], $entity);
			}

		}

		if (isset($company['addresses'])) {
			if (empty($company['addresses'])) {
				if ($entity) $entity->getAddresses()->clear();
				unset($company['addresses']);
			} else {
				$company['addresses'] = static::getAddressesCollection($key, $company['addresses'], $entity);
			}

		}

		if (isset($company['description'])) {
			$company['description'] = static::checkString($key, $company['description'], 'description');
		}

		if (isset($company['logo']) && isset($company['logo']['uploaded']) && isset($company['tradingName'])) {

			if ($entity && !is_null($logo = $entity->getLogo())) {
				$this->getUploadManager()->removeImage($logo);
				$logo = $this->em->getReference('DABase\Entity\Image', $logo->getId());
				$this->em->remove($logo);
			}

			$imgData = [
				'title' => 'Logotipo de ' . $company['tradingName'],
				'author' => 'Logotipo da empresa',
				'licence' => static::checkType($key, 'DABase\Enum\Licence', 'Attribution-NonCommercial-NoDerivs'),
				'description' => 'Logotipo da empresa ' . $company['tradingName'],
				'name' => $company['tradingName'],
				'path' => './build/uploads/company/logos/',
			];

			$company['logo'] = $this->getUploadManager()->getImage($key, $company['logo']['uploaded'], $imgData, 'logo');
		}

		if (isset($company['logo']) && is_array($company['logo']) && !isset($company['logo']['uploaded'])) {
			if (empty($company['logo']) && $entity && !is_null($entity->getLogo())) {
				$logo = $entity->getLogo();
				$this->getUploadManager()->removeImage($logo);
				$this->em->remove($logo);
			} else
				$company['logo'] = $entity->getLogo();
		}

		$newGoodTags = null;

		if (isset($company['goodTags'])) {
			if (empty($company['goodTags'])) {
				if ($entity) $entity->getAddresses()->clear();
				unset($company['goodTags']);
			} else {
				$company['goodTags'] = static::getGoodTagsReferences($key, $company['goodTags'], $entity);
				//unset($company['goodTags']);

			}

		}

		$company = array_filter($company);

		if (static::hasErrors()) {
			$company['errors'] = [];
			$company['errors'] = static::getErrors();
			return false;
		}

		//var_dump($asdas->getGoodTags()->count());die;
		if ($hasParent) {

			if ($entity) {
				(new Hydrator\ClassMethods())->hydrate($company, $entity);
				return $entity;
			} else {
				return new \DABase\Entity\Company($company);
			}
		}

		return $company;
	}
}