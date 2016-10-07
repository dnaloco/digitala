<?php
namespace DACore\Strategy\Entity;

interface CompanyInterface
{
	function getCompany($key, $person, $entity = null);
}