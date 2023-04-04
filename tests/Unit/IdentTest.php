<?php

use AshleyHardy\Utilities\Ident;

test('Ident::uuid returns a valid UUID (v4)', function() {
    $uuid = Ident::uuid();
    expect(Ident::isUuid($uuid))->toBeTrue();
});

test('Ident::isUuid rejects non-uuid values.', function() {
    $uuid = "garbage";
    expect(Ident::isUuid($uuid))->toBeFalse();
});