<?php
namespace DACore\Strategy\Core;

trait SerializerStrategy
{
    public static function getPropertyNamingSerializer()
    {
        return \JMS\Serializer\SerializerBuilder::create()
            ->setPropertyNamingStrategy(new \JMS\Serializer\Naming\SerializedNameAnnotationStrategy(new \JMS\Serializer\Naming\IdenticalPropertyNamingStrategy()))
            ->build();
    }
}
