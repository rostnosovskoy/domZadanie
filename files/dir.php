
<pre>
<?php

$name = "photos";

//$res = opendir($name);

$file = scandir($name);

print_r($file);

echo realpath('../..');
echo "\n";
echo realpath('.');
echo "\n";
echo "\n";


/////////////////////////////////

$file = scandir($name);
foreach ($file as $item) {
    if ($item == '.' or $item == '..')
        continue;
    echo strtolower($item)."<br />";
}

var_dump(glob('photos/*l*.JPG'));
//print_r($file);
