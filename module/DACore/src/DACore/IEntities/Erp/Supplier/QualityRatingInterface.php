<?php
namespace DACore\IEntities\Erp\Supplier;

interface QualityRatingInterface
{
	function getId();
	function getRating();
	function getOrder();
	function getNotes();

}