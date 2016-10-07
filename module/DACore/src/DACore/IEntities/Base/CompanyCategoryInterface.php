<?php
namespace DACore\IEntities\Base;

interface CompanyCategoryInterface
{
	function getId();
	function getName();
	function getChildren();
	function getParent();
}