<?php declare(strict_types=1);

namespace AshleyHardy\Utilities;

use Ramsey\Uuid\Uuid;
use ReflectionClass;
use ReflectionProperty;

class Utils
{
    private static function delimitedToCamel(string $string, string $delimiter): string
    {
        $parts = explode($delimiter, $string);
        $string = array_shift($parts);
        foreach($parts as $part) {
            $string .= ucfirst($part);
        }

        return $string;
    }

    public static function kebabToCamel(string $string): string
    {
        return self::delimitedToCamel($string, '-');
    }

    public static function snakeToCamel(string $string): string
    {
        return self::delimitedToCamel($string, '_');
    }

    public static function kebabToPascal(string $string): string
    {
        return ucfirst(self::kebabToCamel($string));
    }

    public static function camelToSnake(string $string): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $string));
    }

    public static function uuid(): string
    {
        return Uuid::uuid4()->toString();
    }

    public static function nowAsDateTime(): string
    {
        return self::datetime();
    }

    public static function datetime(?int $timestamp = null): string
    {
        return date('Y-m-d H:i:s', $timestamp);
    }    

    public static function isUuid(string $value): bool
    {
        return preg_match('/^[0-9a-fA-F]{8}\b-[0-9a-fA-F]{4}\b-[0-9a-fA-F]{4}\b-[0-9a-fA-F]{4}\b-[0-9a-fA-F]{12}$/', $value) > 0;
    }

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