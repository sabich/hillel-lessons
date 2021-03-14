<?php
$myArray = [
    0 => 'a',
    '1' => [
        'subA',
        3, [
            0 => 'subsubA',
            'test' => 5,
            2 => [
                0 => 'deepA',
                1 => 'deepB'
            ]
        ],
    ],
    2 => 'b',
    5 => [
        'subA',
        4,
        'subC'
    ],
    7 => 'c',
    [
        4,
        8,
        10,
        12,
        3
    ]
];

var_dump($myArray);

$sum = 0;

$iterator = new RecursiveArrayIterator($myArray);

echo 'Result <br/>';

iterator_apply($iterator, 'getSumSecondElement', [$iterator, &$sum]);

function getSumSecondElement($iterator, &$sum) {

    $index = 0;

    while ($iterator->valid()) {

        $current = $iterator->current();

        if ($iterator->hasChildren()) {
            getSumSecondElement($iterator->getChildren(),$sum);
        } else if ($index == 1 && is_int($current)) {
            echo '"' . $iterator->key() . '"' . ' => ' . $current . '<br/>';
            $sum += $current;
        }

        $iterator->next();

        $index++;
    }
}

echo 'sum = ' . $sum;

function recSum(array $arr)
{
    $i = 1;
    $sum = 0;
    foreach ($arr as $key => $value) {
        if (is_array($value)) {
            $sum += recSum($arr);
        }
        if (
            2 == $i
            && (is_integer($value) || is_double($value))
        ) {
            $sum = $value;
        }
        $i++;
    }
    return $sum;
}