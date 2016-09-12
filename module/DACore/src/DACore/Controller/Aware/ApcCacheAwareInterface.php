<?php
namespace DACore\Controller\Aware;

interface ApcCacheAwareInterface
{
	function getCache($cache = null);
}