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
    <title>Document</title>
</head>
<body>
<div style="margin-left: 10px;">
    <a href="index.php">На главную</a>
</div>
<div class="container">
    <form action="1.php" method="post" enctype="multipart/form-data">
        <div style="margin-top: 10px;">
            <input type="file" min = "1" max="20" class="form-control" multiple = "true" name = "files[]" />
        </div>
        <div style="margin-top: 5px;">
            <button class="btn btn-success">Load</button>
        </div>
    </form>
</div>
<?php


function loadFiles($files)
{
    $errors = "";
    if (!isset($files['files']))
    {
        return;
    }

    $myFiles = $files['files'];
    $countUploadFiles = count($myFiles['name']);
    $countUnallowedFiles = 0;

    for ($i = 0; $i < $countUploadFiles; $i ++) {
    switch ($myFiles['error'][$i])
    {
        case 0:
            $error = "File successfully upload";
            break;
        case 1:
            $error = "Max size is not correct.";
            break;
        case 2:
            $error = "Max size is not correct.";
            break;
        case 3:
            $error = "Upload not full file";
            break;
        case 4:
            $error = "File wasn't upload";
            break;
        case 6:
            $error = "Temporary folder for upload isn't exist";
            break;
        case 7:
            $error = "Error write file to disk.";
            break;
        case 8:
            $error = "File extension error. Upload was stoped.";
            break;
    }

        $ext = pathinfo($myFiles['name'][$i], PATHINFO_EXTENSION);

        if (($ext === 'php') || ($ext === 'py') || ($ext === 'pyw') ||
            ($ext === 'pyc') || ($ext === 'pyo') || ($ext === 'pyd') || ($ext === 'pl') ||
            ($ext === 'pm') || ($ext === 'cgi') || ($ext === 'rb') || ($ext === 'java') ||
            ($ext === 'j') || ($ext === 'bsh') || ($ext === 'jav') || ($ext === 'groovy') ||
            ($ext === 'bat')) {
            $countUnallowedFiles++;
            continue;
        }
        if (!($myFiles['size'][$i] > 2000000)) {
            if (!file_exists($ext)) {
                if (!mkdir('./' . $ext)) {
                    return;
                }
                $res = $ext . "/" . $myFiles['name'][$i];
                move_uploaded_file($myFiles['tmp_name'][$i], $res);
            } else {
                $res = $ext . "/" . $myFiles['name'][$i];
                move_uploaded_file($myFiles['tmp_name'][$i], $res);
            }
        } else {
            echo 'Size of file is not correct. Max size should be 2Mb.';
            exit();
        }
    }
    if ($countUnallowedFiles != 0)
    {
        echo "You tried upload {$countUnallowedFiles} file(s) with unallowed extention.";
    }
    return $error;
}

loadFiles($_FILES);

?>

</body>
</html>


