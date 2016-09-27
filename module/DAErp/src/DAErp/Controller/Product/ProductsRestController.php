<?php
namespace DABase\Controller\Product;

use DACore\Controller\AbstractCrudRestController;

class ProductsRestController extends AbstractCrudRestController
{
    protected $aclResource = 'products';
}