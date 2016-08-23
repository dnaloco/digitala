<?php 
namespace DACore\Entity\Base;

interface EmailInterface
{
	function getId();
	function getAnswerable();
	function getAddress();
}