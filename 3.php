<pre>
<?php
function my($num = 0)
{
    static  $count = 0;
    $count++;

    $base = 100;

    echo "my:$count\n";

    return $num + $base;
}

echo my(50);
echo my(200);
echo my();
echo my();
echo my();



?>