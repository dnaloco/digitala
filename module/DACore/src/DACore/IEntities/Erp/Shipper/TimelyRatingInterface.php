<?php
namespace DACore\IEntities\Erp\Shipper;

interface TimelyRatingInterface
{
	function getId();
	function getAppraiser();
	function getRating();
	function getOrder();
	function getShipper();
	function getNotes();
	function getCreatedAt();
}