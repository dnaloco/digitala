<?php
namespace DACore\Interfaces\Rest;

interface PrepareDataInterface {
	function prepareDataToInsert(array $data) : array;
	function prepareDataToUpdate(array $data) : array;
}