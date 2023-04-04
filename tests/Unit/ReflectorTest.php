<?php

use AshleyHardy\Utilities\Reflect;

function testClass(): object
{
    return new class {
        private string $initialised = "yes I am";
        private string $notInitialised;
    };
}

test('Reflect::isPropertyInitialised() returns true for an initialised property.', function() {
    expect(Reflect::isPropertyInitialised('initialised', testClass()))->toBeTrue();
});

test('Reflect::isPropertyInitialised() returns false for an uninitialised property.', function() {
    global $test;
    expect(Reflect::isPropertyInitialised('notInitialised', testClass()))->toBeFalse();
});

test('Reflect::getPropertyFromEntity returns a property.', function() {
    global $test;
    expect(Reflect::getPropertyFromEntity(testClass(), 'initialised'))->toBeInstanceOf(ReflectionProperty::class);
});