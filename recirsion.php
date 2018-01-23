<?php

$arr = [
   12 => [23],
   13 => [23, 45,67],
   14 => [23,5,7,5],
   23,
   45 => [3,5,7,54 => [4,5,6]]
];

function countArr($array)
{
    $count = 0;
    foreach ($array as $item) {
        if (!is_array($item))
            $count++;
        else
           $count += countArr($item);
    }
    return $count;
}

function countArr1($array)
{
    static $count = 0;
    foreach ($array as $item) {
        if (!is_array($item))
            $count++;
        else
           $count += countArr($item);
    }
    echo $count;
}

function sumArr2($array)
{
    $sum = 0;
    foreach ($array as $item) {
        if (!is_array($item))
            $sum += $item;
        else
            $sum += countArr($item);
    }
    return $sum;
}
//-----------------Factorial-----------------------------
function factorial($val)
{
    if ($val === 0)
        return 1;
    elseif ($val === 1)
        return 1;
    else return $val * factorial($val-1);
}

function fac($x)
{
    if (!is_int($x) || ($x < 0))
    {
        echo "You entered uncorrect value. Enter again.";
        exit();
    }
    if (($x === 0) || ($x === 1))
        $res = 1;
    else
        $res = $x * fac($x-1);
    return $res;
}
//------------------------------------------------------


echo countArr($arr). "<br />";
echo countArr($arr). "<br />";
$sum = sumArr2($arr);
echo "Сумма {$sum} <br />";
echo factorial(4). "<br />";
echo fac(-1);