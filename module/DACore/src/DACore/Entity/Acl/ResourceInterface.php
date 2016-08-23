<?php
namespace DACore\Entity\Acl;

interface ResourceInterface
{
	function getId();
	function getName();
	function getCreatedAt();
	function getUpdatedAt();
}