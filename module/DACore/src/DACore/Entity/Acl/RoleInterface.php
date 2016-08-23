<?php
namespace DACore\Entity\Acl;

interface RoleInterface
{
	function getId();
	function getParent();
	function getName();
	function getIsAdmin();
	function getCreatedAt();
	function getUpdatedAt();
}