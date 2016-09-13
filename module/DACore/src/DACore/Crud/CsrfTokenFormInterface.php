<?php
namespace DACore\Crud;

interface CsrfTokenFormInterface
{
	function getCache($cache = null);

	function hasCsrfToken($tokenKey);

	function getCsrfToken($tokenKey);

	function removeCsrfToken($tokenKey);

	function checkCsrfToken($data);

}