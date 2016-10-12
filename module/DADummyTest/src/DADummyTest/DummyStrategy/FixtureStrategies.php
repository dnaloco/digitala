<?php
namespace DADummyTest\DummyStrategy;

use Doctrine\Common\Collections\ArrayCollection;

trait FixtureStrategies
{

	public function setEm($em)
	{
		$this->em = $em;
	}

	public function getPerson($person)
	{
		if (isset($person['birthdate'])) {
			$birthdate = strtotime($person['birthdate']);
			$person['birthdate'] = new \DateTime(date('Y-m-d', $birthdate));
		}

		if (isset($person['emails'])) {
			$collEmails = new ArrayCollection();
			foreach($person['emails'] as $email) {
				$email = new \DABase\Entity\Email($email);
				$collEmails->add($email);
			}
			$person['emails'] = $collEmails;
		}

		if (isset($person['socialNetworks'])) {
			$collSocialNetworks = new ArrayCollection();
			foreach($person['socialNetworks'] as $socialNetwork) {
				$socialNetwork = new \DABase\Entity\socialNetwork($socialNetwork);
				$collSocialNetworks->add($socialNetwork);
			}
			$person['socialNetworks'] = $collSocialNetworks;
		}

		if (isset($person['telephones'])) {
			$collTelephones = new ArrayCollection();
			foreach($person['telephones'] as $telephone) {
				$telephone = new \DABase\Entity\Telephone($telephone);
				$collTelephones->add($telephone);
			}
			$person['telephones'] = $collTelephones;
		}

		if (isset($person['documents'])) {
			$collDocuments = new ArrayCollection();
			foreach($person['documents'] as $document) {
				$document = new \DABase\Entity\Document($document);
				$collDocuments->add($document);
			}
			$person['documents'] = $collDocuments;
		}

		if (isset($person['addresses'])) {
			$collAddresses = new ArrayCollection();
			foreach($person['addresses'] as $address) {
				$address = self::getAddress($address);
				$collAddresses->add($address);
			}
			$person['addresses'] = $collAddresses;
		}

		return new \DABase\Entity\Person($person);
	}

	public function getCompany($company)
	{
		if (isset($company['category'])) {
			$company['category'] = $this->em->getReference('DABase\Entity\CompanyCategory', $company['category']);
		}
		
		if (isset($company['emails'])) {
			$collEmails = new ArrayCollection();
			foreach($company['emails'] as $email) {
				$email = new \DABase\Entity\Email($email);
				$collEmails->add($email);
			}
			$company['emails'] = $collEmails;
		}

		if (isset($company['socialNetworks'])) {
			$collSocialNetworks = new ArrayCollection();
			foreach($company['socialNetworks'] as $socialNetwork) {
				$socialNetwork = new \DABase\Entity\SocialNetwork($socialNetwork);
				$collSocialNetworks->add($socialNetwork);
			}
			$company['socialNetworks'] = $collSocialNetworks;
		}

		if (isset($company['telephones'])) {
			$collTelephones = new ArrayCollection();
			foreach($company['telephones'] as $telephone) {
				$telephone = new \DABase\Entity\Telephone($telephone);
				$collTelephones->add($telephone);
			}
			$company['telephones'] = $collTelephones;
		}

		if (isset($company['documents'])) {
			$collDocuments = new ArrayCollection();
			foreach($company['documents'] as $document) {
				$document = new \DABase\Entity\Document($document);
				$collDocuments->add($document);
			}
			$company['documents'] = $collDocuments;
		}

		if (isset($company['addresses'])) {
			$collAddresses = new ArrayCollection();
			foreach($company['addresses'] as $address) {
				$address = self::getAddress($address);
				$collAddresses->add($address);
			}
			$company['addresses'] = $collAddresses;
		}

		return new \DABase\Entity\Company($company);
	}

	public function getAddress($address)
	{
		$address['city'] = $this->em->getReference('DABase\Entity\City', $address['city']);

		return new \DABase\Entity\Address($address);
	}
}