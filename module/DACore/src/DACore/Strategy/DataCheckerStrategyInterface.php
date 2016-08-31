<?php 
namespace DACore\Strategy;

interface DataCheckerStrategyInterface
{
	const ERROR_REQUIRED_FIELD = 'Required field was not present in data.';
	const ERROR_ENTITY_NOT_FOUND = 'Entity id could not be found.';
	const ERROR_INVALID_EMAIL = 'Email data has an invalid format.';
	const ERROR_INVALID_URL = 'Url data has an invalid format.';
	const ERROR_UNIQUE_FIELD = 'Field data already exist! Choose another one, please.';
	const ERROR_INVALID_STRING = 'String data has an invalid string.';
	const ERROR_INVALID_NUMBER = 'Number data has an invalid number.';
	const ERROR_INVALID_DATE = 'Date field has an invalid format.';

	static function hasErrors();
	static function addDataError($key, $error, $field, $value = null);
	static function getAllErrors();

	static function checkEmail($key, $email, $field = 'email');
	static function checkUnique($key, $unique, $field, $repo);
	static function checkName($key, $name, $field = 'name', $minlength = 6, $maxlength = 100);
	static function checkString($key, $string, $field = 'string');
	static function checkNumber($key, $number, $field = 'number');
	static function checkType($key, $type, $value, $field = 'type');
	static function checkEntityById($key, $entityId, $field, $repo);
	static function checkDateBetween($key, $date, $mindate, $maxdate, $field = "date");
	static function checkUrl($key, $url);
}