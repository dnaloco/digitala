<?php
namespace DACore\Strategy\Core;

interface CsrfTokenFormInterface
{
	function getCache($cache = null);

	function hasCsrfToken($tokenKey);

	function getCsrfToken($tokenKey);

	function removeCsrfToken($tokenKey);

	function checkCsrfToken($data);

}