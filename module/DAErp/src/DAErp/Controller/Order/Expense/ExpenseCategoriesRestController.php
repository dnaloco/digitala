<?php
namespace DAErp\Controller\Order\Expense;

use DACore\Controller\AbstractCrudRestController;

class ExpenseCategoriesRestController extends AbstractCrudRestController
{
    protected $aclResource = 'expenseCategories';
}