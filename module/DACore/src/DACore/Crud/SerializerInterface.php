<?php 
namespace DACore\Crud;

interface SerializerInterface {
	function getPropertyNamingSerializer() : \JMS\Serializer\Naming\PropertyNamingStrategyInterface;
}