<?php
namespace DACore\Strategy;

trait DataCheckerStrategy
{
	// filters
	abstract static function filterEmail($email);
	abstract static function filterName($name);
	abstract static function filterString($string);
	abstract static function filterJsDate($jsDate);
	abstract static function filterDatetimeFormat($datetime, $format = 'Y-m-d H:i:s');
	abstract static function filterUrl($url);

	// validations
	abstract static function hasValidationErrors();
	abstract static function resetValidationErrors();
	abstract static function getValidationErrors();
	abstract static function validateEmail($key, $email);
	abstract static function validateName($key, $name, array $options = array('allowWhiteSpace' => true));
	abstract static function validateNameWithDot($key, $name);
	abstract static function validateMinMaxStringLength($key, $string, $min, $max);
	abstract static function validateEnum($key, $type, $value);
	abstract static function validateDateBetween($key, $date, $mindate, $maxdate, $format = 'Y-m-d H:i:s');
	abstract static function validateUri($key, $uri);

	protected static $dataErrors = array();

	public static function hasErrors()
	{
		return !empty(self::$dataErrors) || static::hasValidationErrors();
	}

	public static function addDataError($key, $error, $field, $value = null)
	{

		if (!isset(self::$dataErrors[$key])) {
			self::$dataErrors[$key] = [];
		}
		self::$dataErrors[$key][]= array('error' => $error, 'field' => $field, 'value' => $value);
	}

	public static function getAllErrors()
	{
		if (static::hasValidationErrors()) {
			array_push(self::$dataErrors, static::getValidationErrors());
			static::resetValidationErrors();
		}
		return self::$dataErrors;
	}

	public static function checkEmail($key, $email, $field = 'email')
	{
		$checkEmail = static::filterEmail($email);

		if (!$checkEmail) {
			self::addDataError($key, self::ERROR_INVALID_EMAIL, $field, $email);
			return false;
		}

		$checkEmail = static::validateEmail($key, $checkEmail);

		return $checkEmail;

	}

	public static function checkUnique($key, $unique, $field, $repo)
	{
		$hasOne = $repo->findOneBy(array($field => $unique));

		if ($hasOne) {
			self::addDataError($key, self::ERROR_UNIQUE_FIELD, $field, $unique);
			return false;
		}

		return $unique;
	}

	public static function checkName($key, $name, $field = 'name', $minlength = 6, $maxlength = 100)
	{
		$checkName = static::validateNameWithDot($key, $name, array('allowWhiteSpace' => true));
		$checkName = $checkName ? static::validateMinMaxStringLength($key, $checkName, $minlength, $maxlength) : false;

		return $checkName;
	}

	public static function checkString($key, $string, $field = 'string')
	{
		$checkString = static::filterString($string);

		if (!$checkString) {
			self::addDataError($key, self::ERROR_INVALID_STRING, $field, $string);
			return $checkString;
		}

		return $checkString;
	}

	public static function checkNumber($key, $number, $field = 'number')
	{
		if (!is_numeric($number)) {
			self::addDataError($key, self::ERROR_INVALID_NUMBER, $field, $number);
			return false;
		}
		return $number;
	}

	public static function checkType($key, $type, $value, $field = 'type')
	{
		$checkType = static::validateEnum($key, $type, $value, $field);

		return $checkType;
	}

	public static function checkEntityById($key, $entityId, $field, $repo)
	{
		$checkEntity = $repo->find((int) $entityId);

		if (!$checkEntity) {
			self::addDataError($key, self::ERROR_ENTITY_NOT_FOUND, $field, $entityId);
		}

		return $checkEntity;
	}

	public static function checkDateBetween($key, $date, $mindate, $maxdate, $field = "date")
	{
		$checkDate = static::filterJsDate($date);

		if (!$checkDate) {
			self::addDataError($key, self::ERROR_INVALID_DATE, $date);
			return $checkDate;
		}

		$checkDate = new \DateTime(static::filterJsDate($checkDate));

		if (!$checkDate) {
			self::addDataError($key, self::ERROR_INVALID_DATE, $date);
			return $checkDate;
		}

		$checkDate = static::validateDateBetween($key, $checkDate, $mindate, $maxdate);

		return $checkDate;
	}

	public static function checkUrl($key, $url)
	{
		$checkUrl = static::filterUrl($url);

		if (!$checkUrl) {
			self::addDataError($key, self::ERROR_INVALID_URL, $date);
			return $checkUrl;
		}

		$checkUrl = static::validateUri($key, $url);

		return $checkUrl;
	}
}