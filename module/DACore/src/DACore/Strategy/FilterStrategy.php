<?php 
namespace DACore\Strategy;

Trait FilterStrategy
{
	public static function filterEmail($email)
	{
		return filter_var($email, FILTER_SANITIZE_EMAIL);
	}
}