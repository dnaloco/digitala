<?php
namespace DACore\Auth;

interface GetSetAdapterInterface
{
	function getUsername() : string;
	function setUsername(string $username);
	function getPassword() : string;
	function setPassword(string $password, string $salt);
	function getRoles() : \Doctrine\Common\Collections\ArrayCollection;
	function setRoles(\Doctrine\Common\Collections\ArrayCollection $roles);

}