<?php 
namespace DABase\Service;

use DACore\Service\AbstractCrudService;

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

class Person extends AbstractCrudService
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
		$data = static::getPerson('person', $data);
		return $data;
	}
}