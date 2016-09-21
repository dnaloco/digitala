<?php
namespace DACore\Entity\Erp\Product;

interface FeatureInterface
{
	function getId();
	function setId();

	function getGroup();
	function setGroup();

	function getValue();
	function setValue();
}