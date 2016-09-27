<?php
namespace DACore\Strategy\Entity;

interface PersonInterface
{
	function getPerson($key, $person, $entity = null);
}