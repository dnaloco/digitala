<?php
namespace DACore\Aware;

interface ApcCacheAwareInterface
{
	function getCache($cache = null);
}