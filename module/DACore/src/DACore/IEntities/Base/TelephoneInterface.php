<?php 
namespace DACore\IEntities\Base;

interface TelephoneInterface
{
	function getId();
	function getAnswerable();
	function getType();
	function getNumber();
	function getMobileOperator();
	function getDDD();
	function getNotes();
}