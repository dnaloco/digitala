<?php
namespace DAErp\Controller\Financial;

use DACore\Controller\AbstractCrudRestController;

class PaymentsRestController extends AbstractCrudRestController
{
    protected $aclResource = 'payments';
}