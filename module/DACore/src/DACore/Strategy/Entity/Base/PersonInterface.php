<?php
namespace DACore\Strategy\Entity\Base;

interface PersonInterface
{
	function getPerson($key, $person, $hasParent = false, $userId = null);
}