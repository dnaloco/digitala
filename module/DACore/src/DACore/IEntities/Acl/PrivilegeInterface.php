<?php
namespace DACore\IEntities\Acl;

interface PrivilegeInterface
{
	function getId();
	function getRole();
	function getResource();
	function getName();
	function getCreatedAt();
	function getUpdatedAt();
}