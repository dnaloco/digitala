<?php
namespace DABase\Entity;

use DACore\Entity\Base\GoodTagInterface;

class GoodTag implements GoodTagInterface
{
	protected $id;

	protected $name;

	protected $features;

	public function __construct(array $data)
	{
		
	}
}
