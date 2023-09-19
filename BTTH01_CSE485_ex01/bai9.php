<?php

function convertToLowercase($arr) {
    $result = [];

    foreach ($arr as $item) {
        $result[] = strtolower((string) $item);
    }

    return $result;
}

$arr1 = ['a', 'b', 'ABC'];
$arr2 = ['1', 'B', 'C', 'E'];
$arr3 = ['a', 0, null, false];

$result1 = convertToLowercase($arr1);
$result2 = convertToLowercase($arr2);
$result3 = convertToLowercase($arr3);


print_r($result1);
print_r($result2);
print_r($result3);


