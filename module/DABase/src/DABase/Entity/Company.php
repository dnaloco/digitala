<?php 
namespace DABase\Entity;

use DACore\Entity\Base\CompanyInterface;

class Company implements CompanyInterface, LegalCustomerInterface
{
	protected $id;

	protected $type;

	protected $tradingName;

	protected $companyName;

	protected $category;

	protected $website;

	protected $telephones;

	protected $documents;

	protected $emails;

	protected $addresses;

	protected $description;

	protected $logo;

	protected $goodTags;

	protected $notes;

	protected $createdAt;

	protected $updatedAt;

	public function __construct(array $data)
	{
		
	}
}