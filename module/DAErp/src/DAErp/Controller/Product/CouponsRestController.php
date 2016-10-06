<?php
namespace DAErp\Controller\Product;

use DACore\Controller\AbstractCrudRestController;

class CouponsRestController extends AbstractCrudRestController
{
    protected $aclResource = 'productCoupons';
}