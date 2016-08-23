<?php
namespace DABase\Entity;

use DACore\Entity\Base\CurrencyInterface;

class Currency implements CurrencyInterface
{
	protected $id;

	protected $name;

	protected $symbol;

	protected $rate;

	public function __construct(array $data)
	{
		
	}
}