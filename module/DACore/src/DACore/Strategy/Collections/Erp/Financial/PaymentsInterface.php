<?php
namespace DACore\Strategy\Collections\Erp\Financial;

interface PaymentsInterface
{
	function getPaymentsCollection($key, $payments, $entity);
}