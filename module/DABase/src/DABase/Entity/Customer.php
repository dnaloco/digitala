<?php
namespace DABase\Entity;

use DACore\Entity\Base\CurrencyInterface;

class Customer implements CustomerInterface
{
	protected $id;

	protected $orders;

	protected $customerEntity;

	protected $balance;

	protected $notes;

	protected $status;

	public function __construct(array $data)
	{
		
	}
}