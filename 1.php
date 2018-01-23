<?php

$numbers = [
    [2,3,5,[5,7,9,5]],
    [6,8,9,48],
    200,
    [[[1]]]
];
$numbers2 = [
    [2,3,5,5],
    [6,8,9,48],
    200
];
//------------------------------Recurtion function (count multi-array elements)----------------------
function arCount($input)
{
    $count = 0;
    foreach ($input as $item) {

        if (!is_array($item))
            $count++;
        else
            $count += arCount($item);
    }

    return $count;
}
//-----------------------------------------------------------------------

//------------------------------Recurtion function (summa multi-array elements)----------------------
function arSum($input)
{
    $sum = 0;
    foreach ($input as $item) {

        if (!is_array($item))
            $sum += $item;
        else
            $sum += arSum($item);
    }

    return $sum;
}
//-----------------------------------------------------------------------//------------------------------Recurtion function (summa multi-array elements)----------------------

//------------------------------Recurtion function (print_r)----------------------
function arPrint_r($input)
{
    $res = "";
//    $sum = 0;
    foreach ($input as $key => $item) {
        if (!is_array($item))
            $res .= "[$key] => $item\n";
        else
            $res .= "[$key] => Array (". arPrint_r($item) . ") \n";
    }
    return $res;
}
//-----------------------------------------------------------------------


echo arCount($numbers). "<br />";
echo arSum($numbers). "<br />";
echo "<pre>";
echo arPrint_r($numbers2);

