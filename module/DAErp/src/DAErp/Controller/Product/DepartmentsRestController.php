<?php
namespace DAErp\Controller\Product;

use DACore\Controller\AbstractCrudRestController;

class DepartmentsRestController extends AbstractCrudRestController
{
    protected $aclResource = 'productDepartments';
}