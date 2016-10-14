<?php
namespace DAErp\Controller\Financial\Accounts;

use DACore\Controller\AbstractCrudRestController;

class MoneyAccountsRestController extends AbstractCrudRestController
{
    protected $aclResource = 'moneyAccounts';
}