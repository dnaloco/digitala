<?php
namespace DABase\Controller\Product;

use DACore\Crud\AbstractCrudRestController;

class CouponsRestController extends AbstractCrudRestController
{
    protected $aclResource = 'productCoupons';
}