<?php
namespace DACore\IEntities\Erp\Order\Production;

interface ProductProcessInterface
{
	function getId();
	function getProduct();
	function getProcesses();
}