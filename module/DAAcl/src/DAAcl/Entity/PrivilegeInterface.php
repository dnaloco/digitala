<?php
namespace DAAcl\Entity;

interface PrivilegeInterface
{
	function getId() : int;
	function getRole() : RoleInterface;
	function getResource() : ResourceInterface;
	function getName() : string;
	function getCreatedAt() : \DateTime;
	function getUpdatedAt() : \DateTime;
}