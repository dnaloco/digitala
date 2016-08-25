<?php
namespace DACore\Crud;

interface PrepareDataInterface {
	function prepareDataToInsert(array $data);
	function prepareDataToUpdate(array $data);
}