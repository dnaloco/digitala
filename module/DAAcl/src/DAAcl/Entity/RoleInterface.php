<?php
namespace DAAcl\Entity;

interface RoleInterface
{
	function getId() : int;
	function getParent() : RoleInterface;
	function getName() : string;
	function getIsAdmin() : boolean;
	function getCreatedAt() : \DateTime;
	function getUpdatedAt() : \DateTime;
}