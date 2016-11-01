<?php
namespace DACore\Strategy\Collections\Erp\Order;

interface StoresInterface
{
	function getStoresCollection($key, $stores, $entity);
}