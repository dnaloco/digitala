<?php
namespace DAErp\Controller\HumanResource\Partner;

use DACore\Controller\AbstractCrudRestController;

class EmployeesRestController extends AbstractCrudRestController
{
    protected $aclResource = 'employees';
}