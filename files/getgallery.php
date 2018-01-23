<?php
echo "<pre>";
print_r($_FILES);
echo "</pre>";

function processFileUpload($files)
{
    $error = "";
    if (!isset($files['photo']))
    {
        return;
    }

    $file = $files['photo'];

    if ($file['error'] !== 0)
    {
        switch ($file['error'])
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

        return $error;
    }

    $file['name'] = strtolower($file['name']);
    $allowedExt = [
        'jpg',
        'jpeg',
        'png'
    ];

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    if (!in_array($ext, $allowedExt))
    {
        return "Wrong file type";
    }

    $allowedMimes = [
        'image/jpeg'
    ];
    if (!in_array($file['type'], $allowedMimes))
    {
        return "Wrong file mime type";
    }

    move_uploaded_file($file['tmp_name'], 'uploads/'.$file['name']);

    return $error;
}

echo processFileUpload($_FILES);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        .gallery {
            width: 650px;
        }
        .photo {
            width: 150px;
            margin: 5px;
        }
    </style>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" class="form-control" name="MAX_FILE_SIZE" value="30000000" />
    <div>
        <input type="file" name="photo" />
    </div>
    <div>
        <button class="btn = btn-success">Load</button>
    </div>
    <div  class="gallery">
        <? foreach (scandir('uploads') as $item) {
            if (in_array($item, ['.', '..'])) {
                continue;
            }
            echo "<img class='photo' src='http://localhost/functions_p2/files/uploads/" . $item . "' >";
        }
        ?>
    </div>
</form>
</body>
</html>
<?php
