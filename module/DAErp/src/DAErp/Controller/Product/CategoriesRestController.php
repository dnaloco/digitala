<?php
namespace DAErp\Controller\Product;

use DACore\Controller\AbstractCrudRestController;

class CategoriesRestController extends AbstractCrudRestController
{
    protected $aclResource = 'productCategories';
}