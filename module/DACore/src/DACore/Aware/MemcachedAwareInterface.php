<?php
namespace DACore\Aware;

interface MemcachedCacheAwareInterface
{
	function getCache($cache = null);
}