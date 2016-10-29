<?php
namespace DACore\Strategy\Core;

interface CheckTokenStrategyInterface
{
    function checkToken();
    function checkAuthorization($headers, $method);
    function checkUser($id);
    function checkOptions($e);
}