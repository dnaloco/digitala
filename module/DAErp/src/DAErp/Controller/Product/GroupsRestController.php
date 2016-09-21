<?php
namespace DABase\Controller\Product;

use DACore\Crud\AbstractCrudRestController;

class GroupsRestController extends AbstractCrudRestController
{
    protected $aclResource = 'productFeatureGroups';
}