<?php
namespace DACore\Strategy;

trait SerializerStrategy
{
    public static function getPropertyNamingSerializer()
    {
        return \JMS\Serializer\SerializerBuilder::create()
            ->setPropertyNamingStrategy(new \JMS\Serializer\Naming\SerializedNameAnnotationStrategy(new \JMS\Serializer\Naming\IdenticalPropertyNamingStrategy()))
            ->build();
    }
}
