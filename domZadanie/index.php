<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <style>
        .photo {
            width: 150px;
            margin: 5px;
        }
        body {
            margin: 5px;
        }
    </style>
    <title>Document</title>
</head>
<body>
<div>
    <h3><a href="1.php" title="Открыть список загруженых файлов">Загрузить файлы</a></h3>
</div>
<?php
function showDirFiles()
{
    $listArr = [];
    $arrFiles = scandir(getcwd());

    foreach ($arrFiles as $file) {
        if (($file === ".") || ($file === ".."))
        {
            continue;
        }
        if (is_dir($file))
        {
            $file = strtolower($file);
            if (($file == 'raw') || ($file == 'jp2') || ($file == 'bmp') || ($file == 'psd') || ($file == 'tiff') || ($file == 'jpg') || ($file == 'jpeg') || ($file == 'png') || ($file == 'gif'))
            {
                $currentDir = scandir($file);
                foreach ($currentDir as $item) {
                    if (($item === ".") || ($item === ".."))
                    {
                        continue;
                    }
                    echo "<img class = 'photo' src='http://localhost/functions_p2/domZadanie/".$file."/".$item."'>";
                }
            }
            else
            {
                $currentDir = scandir($file);
                array_push($listArr, $currentDir);
            }
        }
    }
    return $listArr;
}
echo "<h5>Фото:</h5>";
$otherFiles = showDirFiles();

function outputListArray($array)
{
    echo "<ul>";
    if (is_array($array))
    {
        foreach ($array as $item) {
            if (is_array($item))
            {
                outputListArray($item);
            }elseif (($item === ".") || ($item === ".."))
            {
                continue;
            }else {
                echo "<li> {$item} </li>";
            }
        }
    }
    echo "</ul>";
}
echo "<h5>Документы других форматов:</h5>";
outputListArray($otherFiles);
?>
</body>
</html>
<?php
