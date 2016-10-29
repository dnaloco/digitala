<?php
namespace DAErp\Controller\Order\Production;

use DACore\Controller\AbstractCrudRestController;

class OrdersRestController extends AbstractCrudRestController
{
    protected $aclResource = 'productionOrders';
}