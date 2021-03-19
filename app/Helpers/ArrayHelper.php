<?php

namespace App\Helpers;


class ArrayHelper
{
    public static function sumOfSquaresOfEachElement(array $array): int
    {
        return array_sum(
            array_map(function ($a){
                return $a * $a;
                }, $array)
        );
    }
}