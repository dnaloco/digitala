<?php
namespace DABase\Entity;

use DACore\Entity\Base\TelephoneInterface;

class Telephone implements TelephoneInterface
{
	protected $id;

	protected $answerable;

	protected $type;

	protected $number;

	protected $operator;

	protected $DDD;

	protected $notes;

	public function __construct(array $data)
	{

	}
}