<?php
namespace DAErp\Controller\Product;

use DACore\Controller\AbstractCrudRestController;

class RatingsRestController extends AbstractCrudRestController
{
    protected $aclResource = 'productRatings';
}