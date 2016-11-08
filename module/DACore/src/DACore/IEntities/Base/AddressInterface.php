<?php
namespace DACore\IEntities\Base;

interface AddressInterface
{
	function getId();
	function getType(); 
	function getCity();
	function getAddress1();
	function getAddress2();
	function getNumber();
	function getDistrict();
	function getPostalCode();
	function getNotes();
}