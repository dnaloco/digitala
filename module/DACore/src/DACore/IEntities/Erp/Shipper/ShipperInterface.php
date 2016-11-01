<?php
namespace DACore\IEntities\Erp\Shipper;

interface ShipperInterface
{
	function getId();
	function getCompany();
	function getRatings();
	function getStatus();
	function getNotes();
}