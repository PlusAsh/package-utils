<?php declare(strict_types=1);

namespace AshleyHardy\Utilities;

class Str
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

    private static function camelToDelimited(string $string, string $delimiter): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', $delimiter . '$0', $string));
    }

    public static function camelToSnake(string $string): string
    {
        return self::camelToDelimited($string, '_');    
    }

    public static function camelToKebab(string $string): string
    {
        return self::camelToDelimited($string, '-');
    }

    public static function kebabToPascal(string $string): string
    {
        return self::camelToPascal(self::kebabToCamel($string));
    }

    public static function snakeToPascal(string $string): string
    {
        return self::camelToPascal(self::snakeToCamel($string));
    }

    public static function camelToPascal(String $string): string
    {
        return ucfirst($string);
    }
}