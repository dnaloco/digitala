<?php
namespace DAAcl\Entity;

interface ResourceInterface
{
	function getId() : int;
	function getName() : string;
	function getCreatedAt() : \DateTime;
	function getUpdatedAt() : \DateTime;
}