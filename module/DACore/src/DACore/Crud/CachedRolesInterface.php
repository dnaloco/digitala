<?php
namespace DACore\Crud;

interface CachedRolesInterface
{
	function getCache($cache = null);

	function setRoles($user_id, $roles);

	function getRoles($user_id);

}