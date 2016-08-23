<?php
namespace DACore\Entity\User;

interface UserInterface
{
	function getId();
	function getUser();
	function getPassword();
	function getRoles();
	function getSalt();
	function getActive();
	function getActivationKey();
	function getNotes();
	function getCreatedAt();
	function getUpdatedAt();
}