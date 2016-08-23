<?php
namespace DABase\Entity;

use DACore\Entity\Base\DocumentInterface;

class Document implements DocumentInterface
{
	protected $id;

	protected $type;

	protected $field1;

	protected $field2;

	protected $field3;

	protected $field4;

	protected $field5;

	protected $images;

	public function __construct(array $data)
	{
		
	}
}