<?php 
namespace DACore\Crud;

interface ResponsesInterface {
	function methodNotAllowed();
	function unauthorized();
}