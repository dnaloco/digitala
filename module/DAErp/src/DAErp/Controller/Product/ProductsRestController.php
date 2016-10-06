<?php
namespace DAErp\Controller\Product;

use DACore\Controller\AbstractCrudRestController;

class ProductsRestController extends AbstractCrudRestController
{
    protected $aclResource = 'products';
}