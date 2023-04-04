<?php

use AshleyHardy\Utilities\Cal;

test('DateTime::now returns a MySQL-compatible DATE timestamp of now.', function () {
    $expect = date('Y-m-d H:i:s');
    expect(Cal::now())->toEqual($expect);
});

test('DateTime::stamp returns a MySQL-compatible DATE timestamp of 2nd May 1996, 18:15', function () {
    $timestamp = strtotime("05/02/1996 18:15:00");
    expect(Cal::stamp($timestamp))->toEqual("1996-05-02 18:15:00");
});