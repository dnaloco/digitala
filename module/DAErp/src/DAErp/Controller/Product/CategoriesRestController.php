<?php
namespace DABase\Controller\Product;

use DACore\Crud\AbstractCrudRestController;

class CategoiriesRestController extends AbstractCrudRestController
{
    protected $aclResource = 'productCategories';
}