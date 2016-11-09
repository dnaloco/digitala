<?php
namespace DACore\Strategy\Core;

use Zend\Validator\{EmailAddress, StringLength, Regex, Uri};
use Zend\I18n\Validator\Alnum;

trait DataCheckerStrategy
{
	protected static $dataErrors = [];

	public static function hasErrors()
	{
		return !empty(self::$dataErrors);
	}

	public static function addDataError($key, $error, $field = null, $value = null)
	{

		if (!isset(self::$dataErrors[$key])) {
			self::$dataErrors[$key] = [];
		}
		self::$dataErrors[$key][]= array('error' => $error, 'field' => $field, 'value' => $value);
	}

	public static function getErrors()
	{
		return self::$dataErrors;
	}

	public static function checkEmail($key, $email, $field = 'email')
	{
		$checkEmail = filter_var(trim($email), FILTER_VALIDATE_EMAIL);

		if (!$checkEmail) {
			self::addDataError($key, static::ERROR_INVALID_EMAIL, $field, $email);
			return false;
		}

		return $checkEmail;

	}

	public static function checkReference($key, $id, $field, $repo)
	{
		$reference = $repo->find($id);

		if (!$reference) {
			self::addDataError($key, self::ERROR_INVALID_REFERENCE, $field, $id);
			return false;
		}

		return $reference;
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

	public static function checkName($key, $name, $field = 'name')
	{

		$validator = new Alnum($options);

		if (!$validator->isValid($name)) {
			foreach($validator->getMessages() as $message) {
				self::addDataError($key, $message, $field, $name);
			}
			return false;
		}

		return $checkName;
	}

	public static function checkNameWithSpecials($key, $name, $field = 'name')
	{

		$accentedCharacters = "àèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ";
		$validator = new Regex(array('pattern' => '/^(([' . $accentedCharacters . '0-9A-Za-z.-_\\(\\)\s])+)$/'));

		if (!$validator->isValid($name)) {
			foreach($validator->getMessages() as $message) {
				self::addDataError($key, $message, $field, $name);
			}
			return false;
		}
		return $name;
	}

	public static function checkString($key, $string, $field = 'string')
	{
		$checkString = filter_var(trim($string), FILTER_SANITIZE_STRING);

		if (!$checkString) {
			self::addDataError($key, self::ERROR_INVALID_STRING, $field, $string);
			return false;
		}
		return $checkString;
	}

	public static function checkStringLength ($key, $string, $field = 'string', $min, $max)
	{
		if (!is_null($min) && is_numeric($min) && !is_null($max) && is_numeric($max)) {
			$validator = new StringLength(array('min' => $min, 'max' => $max));
		} else if (!is_null($min) && is_numeric($min)) {
			$validator = new StringLength(array('min' => $min));
		} else if (!is_null($max) && is_numeric($max)) {
			$validator = new StringLength(array('max' => $min));
		} else {
			throw new \Exception('Must have [min]=3rd or/and [max]=4th argument(s).');
		}

		if (!$validator->isValid($string)) {
			foreach($validator->getMessages() as $message) {
				self::addDataError($key, $message, $field, $string);
			}
			return false;
		}

		return $string;
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

		if(!$type::hasValue($value)) {
			$message = 'Not permitted value for the type [' . $type . ']. Permitted values are [' . implode(",", $type::getValues()) . ']';
			self::addDataError($key, $message, $field, $value);
			return false;
		}

		return $value;

		return $checkType;
	}

	// TODO: Terminar este método, que irá verificar se só existe um tipo para determinada coleção no repositório
	public static function checkUniqueType($key, $type, $value, $repo, $field = 'type')
	{
		$checkType = $this->checkType($key, $type, $value, $field);

		if ($checkType) {
			//$checkOne = $repo->findOneBy(a)
		}
	}

	public static function checkDateBetween($key, $date, $field = 'date', $mindate, $maxdate)
	{



		$checkDate = strtotime($date);
		$format = "Y-m-d H:i:s";
		if ($checkDate !== false) {
		 	$checkDate = new \DateTime(date('Y-m-d', $checkDate));
		}

		if (!$checkDate) {
			self::addDataError($key, self::ERROR_INVALID_DATE, $field, $date);
			return false;
		}

		if ($checkDate instanceof \DateTimeInterface) {

	    	if ($checkDate < $mindate) {
	    		self::addDataError($key, 'Invalid date. Date cannot be lesser than ' . $mindate->format($format) .'.', $field, $checkDate->format($format));
	    		return false;
	    	} else if ($checkDate > $maxdate) {
	    		self::addDataError($key, 'Invalid date. Date cannot be greater than ' . $maxdate->format($format) .'.', $field, $checkDate->format($format));
	    		return false;
	    	}
	    } else {
	    	self::addDataError($key, 'Date is not a instance of DateTimeInterface', $field, $date);
	    	return false;
	    }

		return $checkDate;
	}

	public function checkDate($key, $date, $field = 'date')
	{
		$checkDate = strtotime($date);
		
		if ($checkDate !== false) {
		 	$checkDate = new \DateTime(date('Y-m-d', $checkDate));
		}
		
		if (!$checkDate) {
			self::addDataError($key, self::ERROR_INVALID_DATE, $field, $date);
			return false;
		}

		return $checkDate;
	}

	public static function checkUrl($key, $url, $field = 'url')
	{
		$checkUrl = filter_var(trim($url), FILTER_SANITIZE_URL);

		if (!$checkUrl) {
			self::addDataError($key, self::ERROR_INVALID_URL, $date);
			return false;
		}

		$validator = new Regex(array('pattern' => '/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'));


		if (!$validator->isValid($checkUrl)) {
			foreach($validator->getMessages() as $message) {
				self::addDataError($key, $message, $field, $url);
			}
			return false;
		}

		return $checkUrl;
	}

	public static function checkBoolean($key, $boolean, $field)
	{
		$checkBoolean = filter_var($boolean, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === NULL;

		if ($checkBoolean) {
			self::addDataError($key, static::ERROR_INVALID_BOOLEAN, $field, $boolean);
			return false;
		}

		return $checkBoolean;

	}

}