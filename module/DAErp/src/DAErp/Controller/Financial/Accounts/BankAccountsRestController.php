<?php
namespace DAErp\Controller\Financial\Accounts;

use DACore\Controller\AbstractCrudRestController;

class BankAccountsRestController extends AbstractCrudRestController
{
    protected $aclResource = 'bankAccounts';
}