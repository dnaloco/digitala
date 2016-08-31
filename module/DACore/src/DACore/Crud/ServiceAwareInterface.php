<?php 
namespace DACore\Crud;

interface ServiceAwareInterface
{
	static function getServiceName();

	function setService(AbstractCrudService $service);
	function getService() : AbstractCrudService;
}
