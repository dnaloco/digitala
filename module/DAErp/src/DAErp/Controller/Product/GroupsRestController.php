<?php
namespace DAErp\Controller\Product;

use DACore\Controller\AbstractCrudRestController;

class GroupsRestController extends AbstractCrudRestController
{
    protected $aclResource = 'productFeatureGroups';
}