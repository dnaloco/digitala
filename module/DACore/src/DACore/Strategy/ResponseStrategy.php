<?php
namespace DACore\Strategy;

use DACore\Exception\HttpStatusCodeException;

trait ResponseStrategy
{
	public function makeResponseStatus($message, $code, array $context = array(), $firephpDebug = true, $throw = false)
    {
        $this->response->setStatusCode($code);

        if (isset($this->firephp) && $firephpDebug) {
            $this->firephp->addInfo('Info about http status code: (see below)');
            $this->firephp->addError($message, $context);
        } else {

        }

        if ($throw)
            throw new HttpStatusCodeException($message, $code);
    }

    public function statusOk()
    {
        $this->response->setStatusCode(self::CODE_OK);
    }

    function statusCreated($message = null, $resource = null)
    {
        $context = [
            'http_code' => self::CODE_CREATED,
            'http_status' => 'Created',
            'resource_created' => $resource
        ];
        $this->makeResponseStatus($message,self::CODE_CREATED, $context, true);
    }

    function statusNotModified($message = null)
    {
        $context = [
            'http_code' => self::CODE_NOT_MODIFIED,
            'http_status' => 'Not Modified'
        ];
        $this->makeResponseStatus($message, self::CODE_NOT_MODIFIED, $context, true, true);
    }

    function statusBadRequest($message = null)
    {
        $context = [
            'http_code' => self::CODE_BAD_REQUEST,
            'http_status' => 'Bad Request'
        ];
        $this->makeResponseStatus($message, self::CODE_BAD_REQUEST, $context, true, true);
    }

    function statusNotAuthorized($message = null)
    {
        $context = [
            'http_code' => self::CODE_NOT_AUTHORIZED,
            'http_status' => 'Not Authorized'
        ];
        $this->makeResponseStatus($message, self::CODE_NOT_AUTHORIZED, $context, true, true);
    }

    function statusForbidden($message = null)
    {
        $context = [
            'http_code' => self::CODE_FORBIDDEN,
            'http_status' => 'Forbidden'
        ];
        $this->makeResponseStatus($message, self::CODE_FORBIDDEN, $context, true, true);
    }

    function statusResourceNotFound($message = null)
    {
        $context = [
            'http_code' => self::CODE_RESOURCE_NOT_FOUND,
            'http_status' => 'Resource Not Found'
        ];
        $this->makeResponseStatus($message, self::CODE_RESOURCE_NOT_FOUND, $context, true, true);
    }

    function statusMethodNotAllowed($message = null)
    {
        $context = [
            'http_code' => self::CODE_METHOD_NOT_ALLOWED,
            'http_status' => 'Method Not Allowed'
        ];
        $this->makeResponseStatus($message, self::CODE_METHOD_NOT_ALLOWED, $context, true, true);
    }

    function statusServerError($message = null)
    {
        $context = [
            'http_code' => self::CODE_SERVER_ERROR,
            'http_status' => 'Server Error'
        ];
        $this->makeResponseStatus($message, self::CODE_SERVER_ERROR, $context, true, true);
    }
}