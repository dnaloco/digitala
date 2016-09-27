<?php
namespace DABase\Controller\Product;

use DACore\Controller\AbstractCrudRestController;

class FeaturesRestController extends AbstractCrudRestController
{
    protected $aclResource = 'productFeatures';
}