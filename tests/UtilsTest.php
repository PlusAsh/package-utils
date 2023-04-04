<?php declare(strict_types=1);

use AshleyHardy\Utilities\Utils;
use PHPUnit\Framework\TestCase;

class UtilsTest extends TestCase
{
    public function testKebabAndPascalToCamel(): void
    {
        $kebab = "hello-world-how-are-you";
        $camel = "helloWorldHowAreYou";
        $pascal = "HelloWorldHowAreYou";

        $this->assertEquals(
            $camel,
            Utils::kebabToCamel($kebab),
            'Failed to convert kebab-case string to camelCase.'
        );

        $this->assertEquals(
            $pascal,
            Utils::kebabToPascal($kebab),
            'Failed to convert kebab-case string to PascalCase.'
        );
    }
}