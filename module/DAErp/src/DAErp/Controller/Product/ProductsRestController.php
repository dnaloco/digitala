<?php
namespace DABase\Controller\Product;

use DACore\Crud\AbstractCrudRestController;

class ProductsRestController extends AbstractCrudRestController
{
    protected $aclResource = 'products';
}