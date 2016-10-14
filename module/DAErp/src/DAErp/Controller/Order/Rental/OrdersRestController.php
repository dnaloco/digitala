<?php
namespace DAErp\Controller\Order\Rental;

use DACore\Controller\AbstractCrudRestController;

class OrdersRestController extends AbstractCrudRestController
{
    protected $aclResource = 'rentalOrders';
}