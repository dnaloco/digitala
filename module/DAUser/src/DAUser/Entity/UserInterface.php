<?php
namespace DAUser\Entity;

interface UserInterface
{
	function getId() : int;
	function getUser() : string;
	function getPassword() : string;
	function getRoles() : \Doctrine\Common\Collections\ArrayCollection;
	function getSalt() : string;
	function getActive() : boolean;
	function getActivationKey() : string;
	function getNotes() : string;
	function getCreatedAt() : \DateTime;
	function getUpdatedAt() : \DateTime;
}