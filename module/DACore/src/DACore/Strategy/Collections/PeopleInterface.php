<?php
namespace DACore\Strategy\Collections;

interface PeopleInterface
{
	function getPeopleReferences($key, $people, $field);
}