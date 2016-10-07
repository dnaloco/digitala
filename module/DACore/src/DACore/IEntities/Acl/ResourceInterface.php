<?php
namespace DACore\IEntities\Acl;

interface ResourceInterface
{
	function getId();
	function getName();
	function getCreatedAt();
	function getUpdatedAt();
}