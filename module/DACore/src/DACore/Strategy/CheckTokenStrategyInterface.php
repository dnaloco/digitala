<?php
namespace DACore\Strategy;

interface CheckTokenStrategyInterface
{
    const ACL_RULES = [
        'ACCESS' => 'access',
        'ROLE' => 'role',
        'PRIVILEGE' => 'privilege'
    ];

    const ACL_RESOURCES = [
        'GET' => 'GET',
        'POST' => 'POST',
        'UPDATE' => 'UPDATE',
        'DELETE' => 'DELETE',
    ];

    const ACL_ACCESSES = [
        'PUBLIC' => 'public',
        'PRIVATE' => 'private',
    ];

    const ACL_ROLES = [
        'GUEST' => 'guest',
        'ADMIN' => 'admin',
    ];

    const ACL_PRIVILEGES = [
        'SEE' => 'see',
        'CREATE' => 'create',
        'EDIT' => 'edit',
        'DELETE' => 'delete',
    ];
    function checkToken();
    function checkAuthorization($headers, $method);
    function checkUser($id);
    function checkOptions($e);
}