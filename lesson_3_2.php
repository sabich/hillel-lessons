<?php

function countChars($input): array
{
    $input = preg_replace("/[ \t\n\r\"]/", "", $input);
    $chars = preg_split('//u', $input, null, PREG_SPLIT_NO_EMPTY);
    asort($chars);
    return array_count_values($chars);
}

$str = "Let's try some Greek letters: αααααΕεΙιΜμΨψ, Russian: ЙЙЫЫЩН, Czech: ěščřžýáíé";

echo "Исходная строка: \"{$str}\"<br/><br/>";

foreach (countChars($str) as $key => $value) {
    echo "\"{$key}\" встречается в строке {$value} раз(а).<br/>";
}