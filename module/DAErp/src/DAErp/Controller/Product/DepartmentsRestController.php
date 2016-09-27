<?php
namespace DABase\Controller\Product;

use DACore\Controller\AbstractCrudRestController;

class DepartmentsRestController extends AbstractCrudRestController
{
    protected $aclResource = 'productDepartments';
}