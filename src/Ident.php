<?php declare(strict_types=1);

namespace AshleyHardy\Utilities;

use Ramsey\Uuid\Nonstandard\Uuid;

class Ident
{
    public static function uuid(): string
    {
        return Uuid::uuid4()->toString();
    }

    public static function isUuid(string $value): bool
    {
        return preg_match('/^[0-9a-fA-F]{8}\b-[0-9a-fA-F]{4}\b-[0-9a-fA-F]{4}\b-[0-9a-fA-F]{4}\b-[0-9a-fA-F]{12}$/', $value) > 0;
    }
}