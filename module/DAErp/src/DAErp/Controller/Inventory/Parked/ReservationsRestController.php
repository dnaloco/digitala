<?php
namespace DAErp\Controller\Inventory\Parked;

use DACore\Controller\AbstractCrudRestController;

class ReservationsRestController extends AbstractCrudRestController
{
    protected $aclResource = 'reservations';
}