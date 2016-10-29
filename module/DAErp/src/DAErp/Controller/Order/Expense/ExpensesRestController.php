<?php
namespace DAErp\Controller\Order\Expense;

use DACore\Controller\AbstractCrudRestController;

class ExpensesRestController extends AbstractCrudRestController
{
    protected $aclResource = 'orderExpenses';
}