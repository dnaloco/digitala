<?php
namespace DACore\Entity\Erp\Supplier;

interface SupplierInterface
{
	function getId();
	function setId();

	function getPerson();
	function setPerson();

	function getCompany();
	function setCompany();

	function getNotes();
	function setNotes();

	function getProducts();
	function setProducts();
}