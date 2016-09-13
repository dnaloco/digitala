<?php
namespace DACore\Strategy;

interface PrepareDataInterface {
	function prepareDataToInsert(array $data);
	function prepareDataToUpdate(array $data);
}