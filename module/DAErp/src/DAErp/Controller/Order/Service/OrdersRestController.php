<?php
namespace DAErp\Controller\Order\Service;

use DACore\Controller\AbstractCrudRestController;

class OrdersRestController extends AbstractCrudRestController
{
    protected $aclResource = 'serviceOrders';
}