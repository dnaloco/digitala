<?php
namespace DACore\Entity\Base;

interface CustomerInterface
{
	function getId();
	function getOrders();
	function getCustomerEntity();
	function getBalance();
	function getNotes();
	function getStatus();
}

