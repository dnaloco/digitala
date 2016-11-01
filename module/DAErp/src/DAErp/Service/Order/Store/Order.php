<?php
namespace DAErp\Service\Order\Store;

use DACore\Service\AbstractCrudService;
use Doctrine\Common\Collections\ArrayCollection;

use DACore\Strategy\Core\{DataCheckerStrategyInterface, DataCheckerStrategy};

use DACore\Strategy\Collections\Erp\Order\{
    StoresInterface,StoresStrategy
};

class Order extends AbstractCrudService
{
	use StoresStrategy;

	public function prepareData(array $data)
	{
		unset($data['createdAt']);
		unset($data['updatedAt']);
		die('Criando ordem de estoque...');

		$data = array_filter($data);
		$key = 'store_order';

		/*if (isset("claimant"))*/
	}
}