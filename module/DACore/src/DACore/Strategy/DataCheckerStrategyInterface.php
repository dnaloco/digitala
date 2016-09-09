<?php 
namespace DACore\Strategy;

interface DataCheckerStrategyInterface
{
	const ERROR_REQUIRED_FIELD = 'Required field was not present in data.';
	const ERROR_ENTITY_NOT_FOUND = 'Entity id could not be found.';
	const ERROR_INVALID_EMAIL = 'Email data has an invalid format.';
	const ERROR_INVALID_URL = 'Url data has an invalid format.';
	const ERROR_UNIQUE_FIELD = 'Field data already exist! Please, choose another one.';
	const ERROR_INVALID_STRING = 'String data has an invalid string.';
	const ERROR_INVALID_NUMBER = 'Number data has an invalid number.';
	const ERROR_INVALID_DATE = 'Date field has an invalid format.';

	static function hasErrors();
	static function addDataError($key, $error, $field, $value = null);
	static function getErrors();

	static function checkEmail($key, $email, $field = 'email');
	static function checkUnique($key, $unique, $field, $repo);
	static function checkName($key, $name, $field = 'name');
	static function checkNameWithSpecials($key, $name, $field = 'name');
	static function checkString($key, $string, $field = 'string');
	static function checkStringLength ($key, $string, $field = 'string', $min, $max);
	static function checkNumber($key, $number, $field = 'number');
	static function checkType($key, $type, $value, $field = 'type');
	static function checkUniqueType($key, $type, $value, $repo, $field = 'type');
	static function checkEntityById($key, $entityId, $field, $repo);
	static function checkDateBetween($key, $date, $field = 'date', $mindate, $maxdate);
	static function checkUrl($key, $url, $field);
}