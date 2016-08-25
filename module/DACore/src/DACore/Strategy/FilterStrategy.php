<?php 
namespace DACore\Strategy;

Trait FilterStrategy
{
	public static function filterEmail($email)
	{
		return filter_var(trim($email), FILTER_VALIDATE_EMAIL);;
	}
}