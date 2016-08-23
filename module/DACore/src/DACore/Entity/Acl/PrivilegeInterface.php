<?php
namespace DACore\Entity\Acl;

interface PrivilegeInterface
{
	function getId();
	function getRole();
	function getResource();
	function getName();
	function getCreatedAt();
	function getUpdatedAt();
}