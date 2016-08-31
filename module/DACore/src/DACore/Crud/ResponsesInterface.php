<?php 
namespace DACore\Crud;

interface ResponsesInterface {
	function statusOk();
	function statusMethodNotAllowed();
	function statusUnauthorized();
	function statusConflict();
	function statusNoContent();
	function statusNotModified();
}