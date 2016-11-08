<?php
namespace DAFamilyBudget\Controller;

use DACore\Controller\AbstractCrudRestController;

class BillingsRestController extends AbstractCrudRestController
{
    protected $aclResource = 'fbBillings';
}