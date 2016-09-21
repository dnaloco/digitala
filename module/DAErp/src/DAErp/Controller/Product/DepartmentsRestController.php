<?php
namespace DABase\Controller\Product;

use DACore\Crud\AbstractCrudRestController;

class DepartmentsRestController extends AbstractCrudRestController
{
    protected $aclResource = 'productDepartments';
}