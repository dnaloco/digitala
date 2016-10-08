<?php 
namespace DACore\Strategy\Core;
interface ResponsesInterface {
	const CODE_OK = 200;
	const CODE_CREATED = 201;
	const CODE_NOT_MODIFIED = 304;
	const CODE_BAD_REQUEST = 400;
	const CODE_NOT_AUTHORIZED = 401;
	const CODE_FORBIDDEN = 403;
	const CODE_RESOURCE_NOT_FOUND = 404;
	const CODE_METHOD_NOT_ALLOWED = 405;
	const CODE_SERVER_ERROR = 500;

	function statusOk();
	function statusCreated($message = null);
	function statusNotModified($message = null);
	function statusBadRequest($message = null);
	function statusNotAuthorized($message = null);
	function statusForbidden($message = null);
	function statusResourceNotFound($message = null);
	function statusMethodNotAllowed($message = null);
	function statusServerError($message = null);
}