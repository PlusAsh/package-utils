<?php declare(strict_types=1);

namespace AshleyHardy\Utilities;

use ReflectionClass;
use ReflectionProperty;

class Reflect
{
    public static function isPropertyInitialised(string $property, object $object): bool
    {
        return 
            (new ReflectionClass($object))
            ->getProperty($property)
            ->isInitialized($object);
    }

    public static function getPropertyFromEntity(object $entity, string $propertyName): ?ReflectionProperty
    {
        $reflector = new ReflectionClass($entity);
        $properties = $reflector->getProperties();

        foreach($properties as $property) {
            if($property->getName() == $propertyName) return $property;
        }

        return null;
    }
}