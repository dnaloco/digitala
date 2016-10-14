<?php
namespace DAErp\Controller\Order\Rental;

use DACore\Controller\AbstractCrudRestController;

class RentalsRestController extends AbstractCrudRestController
{
    protected $aclResource = 'orderRentals';
}