<?php
namespace DABase\Entity;

use DACore\Entity\Base\StateInterface;

class State implements StateInterface
{
	protected $id;

	protected $ibgeCode;

	protected $name;

	protected $code;

	protected $country;

	public function __construct(array $data)
	{
		
	}
}
