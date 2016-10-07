<?php
namespace DACore\Strategy;

interface CheckTokenStrategyInterface
{
    function checkToken();
    function checkAuthorization($headers, $method);
    function checkUser($id);
    function checkOptions($e);
}