<?php 
namespace DACore\IEntities\Base;

interface EmailInterface
{
	function getId();
	function getAnswerable();
	function getAddress();
}