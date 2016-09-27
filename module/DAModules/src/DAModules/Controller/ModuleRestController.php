<?php
namespace DAModules\Controller;

use DACore\Controller\AbstractCrudRestController;


class ModuleRestController extends AbstractCrudRestController
{

    protected $collectionOptions = array('GET', 'OPTIONS');
    protected $resourceOptions = array();

    protected $aclResource = 'modules';
    protected $aclRules = [
        self::ACL_RESOURCES['GET'] => [
            self::ACL_RULES['ACCESS'] => self::ACL_ACCESSES['PRIVATE'],
            self::ACL_RULES['ROLE'] => self::ACL_ROLES['GUEST'],
            self::ACL_RULES['PRIVILEGE'] => self::ACL_PRIVILEGES['SEE']
        ],
    ];
}