<?php
namespace DABase\Entity;

use DACore\Entity\Base\VideoInterface;

class Video implements VideoInterface
{
	protected $id;

	protected $title;

	protected $address;

	protected $author;

	protected $licence;

	protected $description;
}