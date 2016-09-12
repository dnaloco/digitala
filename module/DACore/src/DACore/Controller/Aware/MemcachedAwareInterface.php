<?php
namespace DACore\Controller\Aware;

interface MemcachedCacheAwareInterface
{
	function getCache($cache = null);
}