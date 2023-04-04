<?php

use AshleyHardy\Utilities\Str;

test('Str::camelToKebab', function() {
    expect(Str::camelToKebab('helloWorld'))->toEqual('hello-world');
});

test('Str::camelToSnake', function() {
    expect(Str::camelToSnake('helloWorld'))->toEqual('hello_world');
});

test('Str::camelToPascal', function() {
    expect(Str::camelToPascal('helloWorld'))->toEqual('HelloWorld');
});