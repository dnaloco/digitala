<?php
namespace DABase\Controller;

use DACore\Controller\AbstractCrudRestController;

class PeopleRestController extends AbstractCrudRestController
{
    protected $aclResource = 'people';
}