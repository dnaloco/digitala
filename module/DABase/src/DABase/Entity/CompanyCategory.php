<?php 
namespace DABase\Entity;

use DACore\Entity\Base\CompanyCategoryInterface;

class CompanyCategory implements CompanyCategoryInterface
{
	protected $id;

	protected $name;

	protected $parent;

	public function __construct(array $data)
	{
		
	}
}