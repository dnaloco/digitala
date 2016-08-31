<?php 
namespace DACore\Strategy;

Trait FilterStrategy
{
	public static function filterEmail($email)
	{
		return filter_var(trim($email), FILTER_VALIDATE_EMAIL);;
	}

	public static function filterName($name)
	{
		return filter_var(ucwords(trim($name)), FILTER_SANITIZE_STRING);;
	}

	public static function filterString($string)
	{
		return filter_var(trim($string), FILTER_SANITIZE_STRING);;
	}

	public static function filterJsDate($jsDate)
	{
		$jsDateTS = strtotime($jsDate);

		if ($jsDateTS !== false) {
		 	return date('Y-m-d', $jsDateTS );
		}

		return false;
	}

	public static function filterDatetimeFormat($datetime, $format = 'Y-m-d H:i:s')
	{
		if ($datetime instanceof \DateTime) {
			return $datetime->format($format);
		}
		return false;
	}

	public static function filterUrl($url) {
		return filter_var(trim($url), FILTER_SANITIZE_URL);
	}

}