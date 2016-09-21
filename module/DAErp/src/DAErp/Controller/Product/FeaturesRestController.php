<?php
namespace DABase\Controller\Product;

use DACore\Crud\AbstractCrudRestController;

class FeaturesRestController extends AbstractCrudRestController
{
    protected $aclResource = 'productFeatures';
}