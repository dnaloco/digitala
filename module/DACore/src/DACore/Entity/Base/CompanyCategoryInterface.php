<?php
namespace DACore\Entity\Base;

interface CompanyCategoryInterface
{
	function getId();
	function getName();
	function getParent();
}