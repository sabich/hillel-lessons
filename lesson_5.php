<?php

abstract class A
{
    abstract function test(int $i): int;
}

class B extends A
{
    function func(string $var)
    {
        return $var . $var;
    }

    function test(int $i): int
    {
        return 1;
    }
}

class C extends A
{
    public function test(int $i): int
    {
        return 2;
    }
}

class D
{
    function test(A $obj)
    {
        return $obj->test(5);
    }
}

class E extends C
{
    function func(string $var)
    {
        return $var . $var;
    }
}

$objB = new B;
$objC = new C;
$objD = new D;
$objE = new E;

var_export($objD->test($objB));
var_export($objD->test($objC));
var_export($objD->test($objE));