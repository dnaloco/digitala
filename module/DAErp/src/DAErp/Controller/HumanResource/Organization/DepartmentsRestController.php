<?php
namespace DAErp\Controller\HumanResource\Organization;

use DACore\Controller\AbstractCrudRestController;

class DepartmentsRestController extends AbstractCrudRestController
{
    protected $aclResource = 'orgDepartments';
}