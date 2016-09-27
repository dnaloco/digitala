<?php
namespace DABase\Controller\Product;

use DACore\Controller\AbstractCrudRestController;

class CouponsRestController extends AbstractCrudRestController
{
    protected $aclResource = 'productCoupons';
}