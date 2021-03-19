<?php


namespace App\Helpers;


class StringHelper
{
    static public function countChars($input): int
    {
        return mb_strlen($input);
    }
}