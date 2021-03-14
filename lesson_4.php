<?php

test('Hello');

function test(string $text)
{
    echo $text;
}

$testString = ' world!';

$closure = function ($test) use ($testString)
{
    echo $test.$testString;
};

//$testString = ' world!';

$closure('Hello!');

function testStatic(int $a = 1)
{
    static $var;
    $var = $var + $a;
    echo $var;
}

testStatic();
testStatic();
testStatic();