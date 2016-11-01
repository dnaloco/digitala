<?php 
namespace DAErp\Service\Supplier;


use Doctrine\Common\Collections\ArrayCollection;

use DACore\Service\AbstractCrudService;

use DACore\Aware\Upload\MyUploadAwareInterface;

use DACore\Strategy\Core\{DataCheckerStrategyInterface, DataCheckerStrategy};
use DACore\Strategy\Collections\Base\{
    AddressesInterface,AddressesStrategy,
    DocumentsInterface,DocumentsStrategy,
    EmailsInterface,EmailsStrategy,
    SocialNetworksInterface,SocialNetworksStrategy,
    TelephonesInterface,TelephonesStrategy,
    PeopleInterface,PeopleStrategy,
    GoodTagsInterface,GoodTagsStrategy
};
use DACore\Strategy\Entity\Base\{
    CompanyInterface,CompanyStrategy
};


class Supplier extends AbstractCrudService
implements
DataCheckerStrategyInterface,
AddressesInterface,
DocumentsInterface,
EmailsInterface,
SocialNetworksInterface,
TelephonesInterface,
CompanyInterface,
PeopleInterface,
GoodTagsInterface,
MyUploadAwareInterface
{
	use DataCheckerStrategy;

    use AddressesStrategy;
    use DocumentsStrategy;
    use EmailsStrategy;
    use SocialNetworksStrategy;
    use TelephonesStrategy;
    use PeopleStrategy;
    use GoodTagsStrategy;
    use CompanyStrategy;

    protected $uploadManager;

	public function setUploadManager(\DACore\Aware\Upload\MyAbstractUpload $uploadManager)
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

			foreach($entity->getCompany()->getContacts() as $contact) {
				$contact->setCompany($entity->getCompany());

				foreach($contact->getDocuments() as $document) {
					$document->setPerson($contact);
					$this->em->persist($document);
				}

				$this->em->persist($contact);
			}

			foreach($entity->getCompany()->getDocuments() as $document) {
				$document->setCompany($entity->getCompany());
				$this->em->persist($document);
			}
			$this->em->flush();
		}

		return $entity;
	}

	public function prepareData(array $data)
	{

		if(isset($data['createdAt'])) unset($data['createdAt']);
		if(isset($data['updatedAt'])) unset($data['updatedAt']);

		$data = array_filter($data);
		$key = 'supplier';

		if (!isset($data['company'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'company');
			return $data;
		} else {
			$type = $this->getAnotherRepository('DACore\IEntities\Base\CompanyTypeInterface')->findOneBy(array('name' => 'supplier'));

			if (is_numeric($data['company']))
				$data['company'] = $this->em->getReference('DACore\IEntities\Base\CompanyInterface', $data['company']);
			else {
				$data['company'] = static::getCompany($key, $data['company'], true);
			}

			if ($data['company'])
				$data['company']->getTypes()->add($type);

			if (isset($data['id'])) {

				$this->em->merge($data['company']);

				$this->em->flush();

				$this->em->clear();

				unset($data['company']);
			}
		}

		if (static::hasErrors()) {
			$data['errors'] = [];
			$data['errors'] = static::getErrors();
		}
		$data = array_filter($data);

		return $data;
	}
}