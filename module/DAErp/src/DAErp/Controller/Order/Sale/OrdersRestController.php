<?php
namespace DAErp\Controller\Order\Sale;

use DACore\Controller\AbstractCrudRestController;

class OrdersRestController extends AbstractCrudRestController
{
    protected $aclResource = 'saleOrders';
}