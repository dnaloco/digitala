<?php
namespace DABase\Entity;

use DACore\Entity\Base\DocumentInterface;

class Email implements EmailInterface
{
	protected $id;

	protected $answerable;

	protected $address;

	public function __construct(array $data)
	{
		
	}
}