<?php
namespace DACore\IEntities\Erp\Product;

interface RatingInterface
{
	function getId();
	function getRating();
	function getAppraiser();
	function getProduct();
	function getNotes();
	function getCreatedAt();
}