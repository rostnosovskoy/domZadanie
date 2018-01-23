<?php

function getArray()
{
    return [
      'a',
      'b',
      'c'
    ];
}

$letter = [
    'a',
    'b',
    'c'
][0];

$var = getArray();
$var2 = $var[2];
$var3 = getArray()[2];

echo $letter. "<br />";

////////////////////////////////////////////


$arr = [1,2,3];
//$a = $arr[0];
//$b = $arr[1];
//$c = $arr[2];

list($a, $b, $c) = $arr;

list($a, $b, $c) = $arr;

$fullName = "Ivan Ivanov";

list($firstName, $lastName) = explode(' ', $fullName);

echo $firstName. " ";
echo $lastName."<br />";

$a = 10;
$b = 20;

list($a, $b) = [$b, $a];

echo "$a, $b";

//---------------Задание неограниченого количества переменных--------------------------
function ourSum()
{
    $args = func_get_args();
    print_r($args);
    echo "<br />";
    return array_sum($args);
}

function ourSum1(...$args)
{
//    $args = func_get_args();
    print_r($args);
    echo "<br />";
    return array_sum($args);
}
//------------------------------------------------------------------------------------

echo ourSum(20, 30, 40, 50, 'Vasya');