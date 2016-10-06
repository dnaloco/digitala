<?php
namespace DAErp\Entity\HumanResource;

class Employee
{
	private $id;
	private $person;
	private $department;
	private $post;
	private $burdens;
	private $onComission;
	private $accounts;
	private $salaries;
	private $expenses;
	private $status;
	private $business;
	private $hiredDate;
	private $firedDate;
	private $literacy;
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="created_at", type="datetime", nullable=false)
	 */
	private $createdAt;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="updated_at", type="datetime", nullable=false)
	 */
	private $updatedAt;
}