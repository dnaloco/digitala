<?php
namespace DACore\Entity\Base;

interface AddressInterface
{
	function getId();

	function getType(); // residential, billing, comercial, other...???

	//get user address1 but in portuguese it means 'rua' or something like 'public place'
	function getAddress1();

	// get use address2 but in portuguese it means 'complementp' or something like 'address 2'
	function getAddress2();

	function getNumber();

	function getResidentialArea();
	function getPostalCode();

	function getCity();
}