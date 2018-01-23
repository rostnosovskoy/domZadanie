<?php

define('EXAMPLE', 'example.txt');
define('FILE_READ', '.gitignore');
if (false  === ($fd = @fopen(EXAMPLE, "a"))) {
    echo "Error open file";
    return;
}

if (false === fwrite($fd, 'test string'))
{
    echo "Error writing file";
}

@fclose($fd);

if(false === $fd =fopen(FILE_READ, "rb"))
{
    echo "Error open file";
    return;
}
$str = "";
while(!feof($fd))
{
    $str .= fread($fd, 1);
    if(false === fread($fd, 1))
    {
        echo "Error read file";
        return;
    }
}
echo $str;

@fclose($fd);
