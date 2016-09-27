<?php 
namespace DAErp\Service\Manufacturer;

use DACore\Service\AbstractCrudService;

use DACore\Upload\MyUploadAwareInterface;

use DACore\Strategy\{DataCheckerStrategyInterface, DataCheckerStrategy};
use DACore\Strategy\Collections\{
    AddressesInterface,AddressesStrategy,
    DocumentsInterface,DocumentsStrategy,
    EmailsInterface,EmailsStrategy,
    SocialNetworksInterface,SocialNetworksStrategy,
    TelephonesInterface,TelephonesStrategy,
    PeopleInterface,PeopleStrategy,
    GoodTagsInterface,GoodTagsStrategy
};
use DACore\Strategy\Entity\{
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

	public function prepareData(array $data)
	{
		if(isset($data['createdAt'])) unset($data['createdAt']);
		if(isset($data['updatedAt'])) unset($data['updatedAt']);

		$data = array_filter($data);
		$key = 'manufacturer';

		if (!isset($data['company'])) {
			$this->addDataError($key, static::ERROR_REQUIRED_FIELD, 'company');
			return $data;
		} else {
			$data['company'] = $this->getCompany($key, $data['company'], true);

			//var_dump($data['company']->getGoodTags()->count());die;
			if (isset($data['id'])) {
				$this->em->merge($data['company']);
				$this->em->flush();
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