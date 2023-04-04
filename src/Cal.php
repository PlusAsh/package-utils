<?php declare(strict_types=1);

namespace AshleyHardy\Utilities;

class Cal
{
    public static function now(): string
    {
        return self::stamp(time());
    }

    public static function stamp(?int $timestamp = null): string
    {
        return date('Y-m-d H:i:s', $timestamp);
    }  
}