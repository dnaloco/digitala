<?php 
namespace DAErp\Service\Manufacturer;


use Doctrine\Common\Collections\ArrayCollection;

use DACore\Service\AbstractCrudService;

use DACore\Upload\MyUploadAwareInterface;

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


class Manufacturer extends AbstractCrudService
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

	public function update(array $data) {
		$entity = parent::update($data);

		//var_dump($entity->getCompany()->getGoodTags()->count());die;

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
		$key = 'manufacturer';

		if (!isset($data['company'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'company');
			return $data;
		} else {
			$type = $this->getAnotherRepository('DACore\IEntities\Base\CompanyTypeInterface')->findOneBy(array('name' => 'manufacturer'));
			$data['company']['types'] = new ArrayCollection();
			$data['company']['types']->add($type);

			$data['company'] = static::getCompany($key, $data['company'], true);
			//$this->em->merge($data['company']);
			//$this->flush();
			//die;
			//var_dump($data['company']->getGoodTags()->count());die;

			//unset($data['compact']['contacts']);
			//var_dump(isset($data['company']['newGoodTags']));die;

			if (isset($data['id'])) {
				//var_dump('SHIT', $data['company']->getGoodTags()->count());die;

				$this->em->merge($data['company']);
				//$this->em->persist($data['company']->getGoodTags());die;
				$this->em->flush();

				$this->em->clear();

				unset($data['company']);
			}
		}
		//die;
		//var_dump('...');die;
		//var_dump($data['company']->getId());die;
		if (static::hasErrors()) {
			$data['errors'] = [];
			$data['errors'] = static::getErrors();
		}
		$data = array_filter($data);

		return $data;
	}
}