<?php
namespace DAUser\Service;

use DACore\Crud\AbstractCrudService;
use Doctrine\Common\Collections\ArrayCollection;
use DACore\Strategy\{DataCheckerStrategyInterface, DataCheckerStrategy};
use DACore\Upload\MyUploadAwareInterface;

class User extends AbstractCrudService
implements
DataCheckerStrategyInterface,
MyUploadAwareInterface
{
	use DataCheckerStrategy;

	protected $uploadManager;

	public function setUploadManager(\DACore\Upload\MyAbstractUpload $uploadManager)
	{
		$this->uploadManager = $uploadManager;
	}
	
	public function getUploadManager()
	{
		return $this->uploadManager;
	}

	public function insert(array $data)
	{
		$entity = parent::insert($data);

		if ($entity instanceof $this->entity) {
			if($entity->getPerson()) {
				$personRepo = $this->getAnotherRepository('DABase\Entity\Person');
				$person = $personRepo->find((int) $entity->getPerson()->getId());
				foreach($person->getDocuments() as $document) {
					$document->setPerson($person);
					$this->em->persist($document);
				}
				$person->setUser($entity);
				$this->em->persist($person);
				$this->em->flush();
			} else if ($entity->getCompany()) {
				$companyRepo = $this->getAnotherRepository('DABase\Entity\Company');
				$company = $companyRepo->find((int) $entity->getCompany()->getId());
				foreach($company->getDocuments() as $document) {
					$document->setCompany($company);
					$this->em->persist($document);
				}
				$company->setUser($entity);
				$this->em->persist($company);
				$this->em->flush();
			}

			$entity->unsetCredentials();
		}

		return $entity;
	}

	public function getList(array $options = array(), array $where = array(), $limit = null, $offset = null)
	{
		$data = parent::getList($options, $where, $limit, $offset);

		foreach($data as $user) {
			$user = self::getFilteredUser($user);
		}

		return $data;
	}

	public function getFilteredUser($user) 
	{
		$user->unsetCredentials();

		return $user;

	}

	// REPAIR getGuestRole...
	public function getGuestRole() {
		$roles = new ArrayCollection();
		$roleRepo = $this->getAnotherRepository('DAAcl\Entity\Role');
		$guest = $roleRepo->findOneBy(array('name' => 'guest'));
		$roles->add($guest);
		return $roles;
	}

	public function getEmailsCollection($key, $emails)
	{
		$arrEmails = new ArrayCollection();
		$key = $key . '_emails';
		foreach($emails as $email) {
			// email anwserable not required.
			if (isset($email['anwserable'])) {
				$email['anwserable'] = static::checkNameWithSpecials($key, $email['anwserable'], 'anwserable');
				if (!$email['anwserable']) return false;

			}
			// email address REQUIRED!
			if (!isset($email['address'])) {
				static::addDataError($key, static::ERROR_UNIQUE_FIELD, 'email');
			} else {
				$email['address'] = static::checkEmail($key, $email['address']);

				if (!$email['address']) {
					return false;
				} else {
					$repoEmail = $this->getAnotherRepository('\DABase\Entity\Email');
					$email['address'] = static::checkUnique($key, $email['address'], 'address', $repoEmail);

					if (!$email['address']) return false;
				}
			}

			$arrEmails->add(new \DABase\Entity\Email($email));
		}

		return $arrEmails;
	}

	public function getAddressesCollection($key,$addresses)
	{

		$arrAddresses = new ArrayCollection();
		$key = $key . '_addresses';

		foreach($addresses as $address) {

			if (!isset($address['type'])) {
				static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'type');
				return false;
			} else {
				$address['type'] = static::checkType($key, 'DACore\Enum\AddressType', $address['type']);
				if (!$address['type']) return false;
			}



			if (!isset($address['city']) && !isset($address['city']['id'])) {
				static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'city');
				return false;
			} else {
				$repoCity = $this->getAnotherRepository('DABase\Entity\City');
				$address['city'] = static::checkEntityById($key, $address['city']['id'], 'city', $repoCity);
				if (!$address['city']) return false;
			}

			if (!isset($address['address1'])) {
				static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'address1');
				return false;
			} else {
				$address['address1'] = static::checkString($key, $address['address1']);
				if (!$address['address1']) return false;
			}

			if (isset($address['address2'])) {
				$address['address2'] = static::checkString($key, $address['address2']);
				if (!$address['address1']) return false;
			}

			if (!isset($address['number'])) {
				static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'number');
				return false;
			} else {
				$address['number'] = static::checkNumber($key, $address['number']);
				if (!$address['number']) return false;
			}

			if (!isset($address['residentialArea'])) {
				static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'residentialArea');
				return false;
			} else {
				$address['residentialArea'] = static::checkString($key, $address['residentialArea']);
				if (!$address['residentialArea']) return false;
			}

			if (!isset($address['postalCode'])) {
				static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'postalCode');
				return false;
			} else {
				$address['postalCode'] = static::checkString($key, $address['postalCode']);
				if (!$address['postalCode']) return false;
			}
			

			if (static::hasErrors()) return false;

			$arrAddresses->add(new \DABase\Entity\Address($address));
		}


		return $arrAddresses;
	}

	public function getTelephonesCollection($key, $telephones)
	{

		$arrTelephones = new ArrayCollection();
		$key = $key . '_telephones';

		foreach ($telephones as $telephone) {
			//	fields: answerable, type, number, mobileOperator, DDD, notes

			if (isset($telephone['anwserable'])) {
				$telephone['anwserable'] = static::checkNameWithSpecials($key, $telephone['anwserable'], 'anwserable');
				if (!$telephone['anwserable']) return false;

			}

			if (!isset($telephone['type'])) {
				static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'type');
				return false;
			} else {
				$telephone['type'] = static::checkType($key, 'DACore\Enum\TelephoneType', $telephone['type']);
				if (!$telephone['type']) return false;
			}

			if (!isset($telephone['number'])) {
				static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'number');
			} else {
				$telephone['number'] = static::checkNumber($key, $telephone['number']);

				if (!$telephone['number']) return false;
			}

			if (isset($telephone['mobileOperator'])) {
				$telephone['mobileOperator'] = static::checkType($key, 'DACore\Enum\MobileOperator', $telephone['mobileOperator']);
				if (!$telephone['mobileOperator']) return false;
			}

			if (isset($telephone['DDD'])) {
				$telephone['DDD'] = static::checkNumber($key, $telephone['DDD'], 'DDD');
				if (!$telephone['DDD']) return false;

			}

			if (isset($telephone['notes'])) {
				$telephone['notes'] = static::checkString($key, $telephone['DDD'], 'DDD');
				if (!$telephone['notes']) return false;

			}
			if (static::hasErrors()) return false;
				
			$arrTelephones->add(new \DABase\Entity\Telephone($telephone));
		}

		return $arrTelephones;
	}

	public function getSocialNetworksCollection($key, $socialNetworks)
	{
		$arrSocialNetworks = new ArrayCollection();
		$key = $key . '_socialNetworks';

		foreach($socialNetworks as $socialNetwork) {
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
				$repoSocial = $this->getAnotherRepository('DABase\Entity\SocialNetwork');
				$socialNetwork['address'] = static::checkUrl($key, $socialNetwork['address'], 'address');

				$socialNetwork['address'] = $socialNetwork['address'] ? static::checkUnique($key, $socialNetwork['address'], 'address', $repoSocial) : false;

				if (!$socialNetwork['address']) return false;
			}
			if (static::hasErrors()) return false;

			$arrSocialNetworks->add(new \DABase\Entity\SocialNetwork($socialNetwork));
		}

		return $arrSocialNetworks;
	}

	public function getDocumentsCollection($key, $documents)
	{
		$arrDocuments = new ArrayCollection();
		$key = $key . '_documents';

		foreach($documents as $document) {
			if (!isset($document['type'])) {
				static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'type');
				return false;
			} else {
				$document['type'] = static::checkType($key, 'DACore\Enum\DocumentType', $document['type']);
				if (!$document['type']) return false;
			}

			if (!isset($document['field1'])) {
				static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'field1');
				return false;
			} else {
				$document['field1'] = static::checkString($key, $document['field1'], 'field1');
				if (!$document['field1']) return false;
			}

			if (isset($document['field2'])) {
				$document['field2'] = static::checkString($key, $document['field2'], 'field2');
				if (!$document['field2']) return false;
			}

			if (isset($document['field3'])) {
				$document['field3'] = static::checkString($key, $document['field3'], 'field3');
				if (!$document['field3']) return false;
			}

			if (isset($document['field4'])) {
				$document['field4'] = static::checkString($key, $document['field4'], 'field4');
				if (!$document['field4']) return false;
			}

			if (isset($document['field5'])) {
				$document['field5'] = static::checkString($key, $document['field5'], 'field5');
				if (!$document['field5']) return false;
			}

			if (static::hasErrors()) return false;

			$arrDocuments->add(new \DABase\Entity\Document($document));
		}

		return $arrDocuments;
	}

	public function getGoodTagsCollection($key, $goodTags)
	{
		$arrGoodTags = new ArrayCollection();
		$key = $key . '_goodTags';
	}

	protected static function getFileDestination($baseDestination, $uniqueId, $title, $ext, $prefix = null)
	{
		return $baseDestination . $uniqueId . $title . $prefix . '.' . $ext;
	}

	public function getPhoto($key, $photo, $name)
	{
		$key = $key . '_photo';
		$imagesize = getimagesize('./tmp/' . $photo);
		$baseDestination = './build/uploads/person/photos/';
		$this->getUploadManager()->clearPath($baseDestination);
		$ext = pathinfo($photo, PATHINFO_EXTENSION);
		$uniqueId = uniqid();

		$destinations = [
			'thumb' => [
				'dest' => self::getFileDestination($baseDestination, $uniqueId, $name, $ext, '_thumb'),
				'desired_width' => 200
			],
			'small' => [
				'dest' => self::getFileDestination($baseDestination, $uniqueId, $name, $ext, '_small'),
				'desired_width' => 360
			],
			'medium' => [
				'dest' => self::getFileDestination($baseDestination, $uniqueId, $name, $ext, '_medium'),
				'desired_width' => 800
			],
			'large' => [
				'dest' => self::getFileDestination($baseDestination, $uniqueId, $name, $ext, '_large'),
				'desired_width' => 1080
			],
			'xlarge' => [
				'dest' => self::getFileDestination($baseDestination, $uniqueId, $name, $ext, '_xlarge'),
				'desired_width' => 1440
			],
			'original' => [
				'dest' => self::getFileDestination($baseDestination, $uniqueId, $name, $ext),
			]
		];

		$uploadsResult = $this->getUploadManager()->moveUploaded($photo, $destinations);

		$imageData = [];

		$imageData['title'] = 'Foto de ' . $name;
		$imageData['author'] = 'foto do proprietário da conta';
		$imageData['licence'] = $person['gender'] = static::checkType($key, 'DACore\Enum\Licence', 'Attribution-NonCommercial-NoDerivs');
		$imageData['description'] = 'Imagem de foto do usuário fornecida pelo próprio.';
		$imageData['name'] = $uniqueId . $name;
		$imageData['path'] = $baseDestination;

		foreach($uploadsResult as $result) {

			if($result['desired_width'] == 'thumb' && $result['result'])  {
				$imageData['hasThumb'] = true;
			} else if($result['desired_width'] == 'small' && $result['result'])  {
				$imageData['hasSmall'] = true;
			} else if($result['desired_width'] == 'medium' && $result['result'])  {
				$imageData['hasMedium'] = true;
			} else if($result['desired_width'] == 'large' && $result['result'])  {
				$imageData['hasLarge'] = true;
			} else if($result['desired_width'] == 'xlarge' && $result['result'])  {
				$imageData['hasXLarge'] = true;
			}
		}

		$imageData['alt'] = 'Foto do proprietário da conta';
		$imageData['width'] = $imagesize[0];
		$imageData['height'] = $imagesize[1];
		$imageData['filetype'] = $ext;

		//var_dump($imageData);die;

		return new \DABase\Entity\Image($imageData);
	}

	public function getPerson($key, $person)
	{
		$person = array_filter($person);
		$key = $key . '_person';

		// person name REQUIRED!
		if (!isset($person['name'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'name');
		} else {
			$person['name'] = static::checkNameWithSpecials($key, $person['name']);
		}

		// gender REQUIRED!
		if (!isset($person['gender'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'gender');
		} else {
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

		if (isset($person['photo']) && isset($person['photo']['uploaded']) && isset($person['name'])) {
			$person['photo'] = $this->getPhoto($key, $person['photo']['uploaded'], $person['name']);
		}

		if (isset($person['emails'])) {
			$person['emails'] = $this->getEmailsCollection($key, $person['emails']);
		}

		if (isset($person['addresses'])) {
			$person['addresses'] = $this->getAddressesCollection($key, $person['addresses']);
		}

		if (isset($person['telephones'])) {
			$person['telephones'] = $this->getTelephonesCollection($key, $person['telephones']);
		}

		if (isset($person['socialNetworks'])) {
			$person['socialNetworks'] = $this->getSocialNetworksCollection($key, $person['socialNetworks']);
		}

		if (isset($person['documents'])) {
			$person['documents'] = $this->getDocumentsCollection($key, $person['documents']);
		}

		if (static::hasErrors()) return false;

		$person = new \DABase\Entity\Person($person);

		return $person;
	}

	public function prepareDataToInsert(array $data)
	{


		$data = array_filter($data);
		$key = 'user';

		if (!isset($data['active'])) $data['active'] = false;

		// user role REQUIRED!
		if (!isset($data['roles'])) {
			$data['roles'] = $this->getGuestRole();
		}

		// user validation REQUIRED!
		if (!isset($data['user'])) {
			$this->addDataError($key, static::ERROR_REQUIRED_FIELD, 'user');
		} else {
			$data['user'] = static::checkEmail($key, $data['user'], 'user');
			$data['user'] = $data['user'] ? static::checkUnique($key, $data['user'], 'user', $this->getRepository()) : null;
		}

		// password validation REQUIRED!
		if (!isset($data['password'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'password');
		} else {
			$data['password'] = static::checkString($key, $data['password'], 'password');
			$data['password'] = static::checkStringLength($key, $data['password'], 'password', 6, 32);
		}

		// person or company REQUIRED!
		if (isset($data['person'])) {
			$data['person'] = $this->getPerson($key, $data['person']);

		} else if (isset($data['company'])) {

		} else {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'person or company');
		}

		if (static::hasErrors()) {
			$data['errors'] = [];
			$data['errors'] = static::getErrors();
		}
		//var_dump($data);die;
		return $data;
	}

	public function prepareDataToUpdate(array $data)
	{

	}
}