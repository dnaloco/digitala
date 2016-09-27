<?php
namespace DAUser\Service;

use DACore\Service\AbstractCrudService;
use Doctrine\Common\Collections\ArrayCollection;
use DACore\Strategy\{DataCheckerStrategyInterface, DataCheckerStrategy};
use DACore\Upload\MyUploadAwareInterface;

use DACore\Strategy\Collections\{
    AddressesInterface,AddressesStrategy,
    DocumentsInterface,DocumentsStrategy,
    EmailsInterface,EmailsStrategy,
    SocialNetworksInterface,SocialNetworksStrategy,
    TelephonesInterface,TelephonesStrategy
};

class User extends AbstractCrudService
implements
DataCheckerStrategyInterface,
MyUploadAwareInterface
{
	use DataCheckerStrategy;

    use AddressesStrategy;
    use DocumentsStrategy;
    use EmailsStrategy;
    use SocialNetworksStrategy;
    use TelephonesStrategy;

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

	public function getGoodTagsCollection($key, $goodTags)
	{
		$arrGoodTags = new ArrayCollection();
		$key = $key . '_goodTags';
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
			$repoEmail = $this->getAnotherRepository('\DABase\Entity\Email');
			$person['emails'] = static::getEmailsCollection($key, $person['emails'], $repoEmail);
		}

		if (isset($person['addresses'])) {
			$person['addresses'] = static::getAddressesCollection($key, $person['addresses']);
		}

		if (isset($person['telephones'])) {
			$person['telephones'] = static::getTelephonesCollection($key, $person['telephones']);
		}

		if (isset($person['socialNetworks'])) {
			$repoSocial = $this->getAnotherRepository('DABase\Entity\SocialNetwork');
			$person['socialNetworks'] = static::getSocialNetworksCollection($key, $person['socialNetworks'], $repoSocial);
		}

		if (isset($person['documents'])) {
			$person['documents'] = static::getDocumentsCollection($key, $person['documents']);
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

	public function activateUser($key)
	{
		$repo = $this->getRepository();
        
        $user = $repo->findOneBy(array('activationKey'=>$key));
        
        if($user && !$user->getActive())
        {
            $user->setActive(true);
            $user->setActivationKey();
            
            $this->em->persist($user);
            $this->em->flush();
            
            return $user;
        }
	}
}