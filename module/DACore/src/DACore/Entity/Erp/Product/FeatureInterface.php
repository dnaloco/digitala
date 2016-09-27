<?php
namespace DACore\Entity\Erp\Product;

interface FeatureInterface
{
	function getId();
	function setId($id);

	function getGroup();
	function setGroup($group);

	function getValue();
	function setValue($value);
}