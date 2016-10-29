<?php
namespace DAErp\Controller\Inventory\Warehouse;

use DACore\Controller\AbstractCrudRestController;

class WarehousesRestController extends AbstractCrudRestController
{
    protected $aclResource = 'warehouses';
}