<?php
namespace DACore\Interfaces\Rest;

interface PrepareDataInterface {
	function prepareDataToInsert(array $data);
	function prepareDataToUpdate(array $data);
}