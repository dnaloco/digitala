<?php
namespace DAErp\Controller\Order\Sale;

use DACore\Controller\AbstractCrudRestController;

class SalesRestController extends AbstractCrudRestController
{
    protected $aclResource = 'orderSales';
}