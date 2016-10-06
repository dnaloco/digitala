<?php
namespace DACore\Strategy\Entity;

interface PersonInterface
{
	function getPerson($key, $person, $hasParent = false, $userId = null);
}