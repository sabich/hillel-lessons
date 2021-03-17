<?php

$list = [
    ['Name', 'Age', 'Gender'],
    ['Bob', 20, 'Male'],
    ['John', 25, 'Male'],
    ['Jessica', 30, 'Female']
];

/**
 * @param string $fileName
 * @param array $array
 */
function writeCSV(string $fileName, array $array)
{
    if (! is_dir('csv')) {
        mkdir('csv');
    }

    $fp = fopen('csv/'.$fileName, 'w');

    foreach ($array as $fields) {
        fputcsv($fp, $fields);
    }

    fclose($fp);
}

writeCSV('list.csv', $list);