<?php
namespace DAErp\Controller\Order\Expense;

use DACore\Controller\AbstractCrudRestController;

class OrdersRestController extends AbstractCrudRestController
{
    protected $aclResource = 'expenseOrders';
}