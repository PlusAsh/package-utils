<?php

use AshleyHardy\Utilities\Str;

test('Str::kebabToCamel', function() {
    expect(Str::kebabToCamel('hello-world'))->toEqual('helloWorld');
});

test('Str::snakeToCamel', function() {
    expect(Str::snakeToCamel('hello_world'))->toEqual('helloWorld');
});

test('Str::camelToSnake', function() {
    expect(Str::camelToSnake('helloWorld'))->toEqual('hello_world');
});

test('Str::camelToKebab', function() {
    expect(Str::camelToKebab('helloWorld'))->toEqual('hello-world');
});

test('Str::kebabToPascal', function() {
    expect(Str::kebabToPascal('hello-world'))->toEqual('HelloWorld');
});

test('Str::snakeToPascal', function() {
    expect(Str::snakeToPascal('hello_world'))->toEqual('HelloWorld');
});

test('Str::camelToPascal', function() {
    expect(Str::camelToPascal('helloWorld'))->toEqual('HelloWorld');
});

test('Str::tokenise can process a list', function() {
    $string = "{0} {1}";
    $tokens = ['Hello', 'World'];

    expect(Str::tokenise($string, $tokens))->toEqual('Hello World');
});

test('Str::tokenise can process an associative array', function() {
    $string = "{{ greeting }} {{ noun }}";
    $tokens = [
        'greeting' => 'Whaddup',
        'noun' => 'yo'
    ];

    expect(Str::tokenise($string, $tokens))->toEqual('Whaddup yo');
});