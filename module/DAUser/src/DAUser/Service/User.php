<?php
namespace DAUser\Service;

use DACore\Service\AbstractCrudService;
use Doctrine\Common\Collections\ArrayCollection;

use DACore\Upload\MyUploadAwareInterface;
use DACore\Strategy\{DataCheckerStrategyInterface, DataCheckerStrategy};
use DACore\Strategy\Collections\{
    AddressesInterface,AddressesStrategy,
    DocumentsInterface,DocumentsStrategy,
    EmailsInterface,EmailsStrategy,
    SocialNetworksInterface,SocialNetworksStrategy,
    TelephonesInterface,TelephonesStrategy
};

use DACore\Strategy\Entity\{
    PersonInterface,PersonStrategy
};
class User extends AbstractCrudService
implements
DataCheckerStrategyInterface,
AddressesInterface,
DocumentsInterface,
EmailsInterface,
SocialNetworksInterface,
TelephonesInterface,
PersonInterface,
MyUploadAwareInterface
{
	use DataCheckerStrategy;

    use AddressesStrategy;
    use DocumentsStrategy;
    use EmailsStrategy;
    use SocialNetworksStrategy;
    use TelephonesStrategy;
    use PersonStrategy;

	protected $uploadManager;

	private $checkUnique = true;

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
				$personRepo = $this->getAnotherRepository('DACore\Entity\Base\PersonInterface');
				$person = $personRepo->find((int) $entity->getPerson()->getId());
				foreach($person->getDocuments() as $document) {
					$document->setPerson($person);
					$this->em->persist($document);
				}
				$person->setUser($entity);
				$this->em->persist($person);
				$this->em->flush();
			} else if ($entity->getCompany()) {
				$companyRepo = $this->getAnotherRepository('DACore\Entity\Base\CompanyInterface');
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
		$roleRepo = $this->getAnotherRepository('DACore\Entity\Acl\RoleInterface');
		$guest = $roleRepo->findOneBy(array('name' => 'guest'));
		$roles->add($guest);
		return $roles;
	}

	public function prepareData(array $data)
	{
		//var_dump('afffff');die;
		$userId = null;
		if (isset($data['id'])) {
			$this->checkUnique = false;
			
			$userId = $data['id'];
			
			$entity = null;
			$entity = $this->em->getReference('DAUser\Entity\User', $userId);

		}

		if(isset($data['createdAt'])) unset($data['createdAt']);
		if(isset($data['updatedAt'])) unset($data['updatedAt']);
		
		$data = array_filter($data);
		//var_dump($data);die;
		$key = 'user';

		if (!isset($data['active'])) $data['active'] = false;

		// user role REQUIRED!
		if (!isset($data['roles'])) {
			$data['roles'] = $this->getGuestRole();
		} else {
			unset($data['roles']);
		}

		// user validation REQUIRED!
		if (!isset($data['user'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'user');
		} else {
			$data['user'] = static::checkEmail($key, $data['user'], 'user');
			if ($this->checkUnique)
				$data['user'] = $data['user'] ? static::checkUnique($key, $data['user'], 'user', $this->getRepository()) : null;
		}

		// password validation REQUIRED!
		if (!isset($data['password']) && $this->checkUnique) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'password');
		} else {
			if ($this->checkUnique || isset($data['changedPass'])) {
				$data['password'] = static::checkString($key, $data['password'], 'password');
				$data['password'] = static::checkStringLength($key, $data['password'], 'password', 6, 32);
			}
		}

		// person or company REQUIRED!
		if (isset($data['person'])) {

			$data['person'] = static::getPerson($key, $data['person'], true, $userId);

			if ($userId) {

				$this->em->merge($data['person']);
				$this->em->flush();

				unset($data['person']);
			}

		} else if (isset($data['company'])) {

		} else {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'person or company');
		}

		if (static::hasErrors()) {
			$data['errors'] = [];
			$data['errors'] = static::getErrors();
		}

		return $data;
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