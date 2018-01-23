<?php
//echo date('y-m-d H:i:s');

define('FILE_NAME', 'data.txt');

$comment = [];

if (file_exists(FILE_NAME))
{
    $oldserializedComments = file_get_contents(FILE_NAME);
    $allcomments = unserialize($oldserializedComments);
}


if (isset($_POST['username']))
    $comment['username'] = $_POST['username'];

if (isset($_POST['comment']))
    $comment['comment'] = $_POST['comment'];

if (isset($_POST['username']) && isset($_POST['comment']))
{

}

$allcomments = $comment;

$serializedComments = serialize($allcomments);

file_put_contents(FILE_NAME, $serializedComments);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .field-lable
        {
            width: 115px;
            display: inline-block;
            margin: 15px;
        }
        .comment {
            background: #eee;
            margin: 10px;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <div>
            <label class="field-lable" for="username">Ваше имя:</label>
            <input type="text" id="username" name="username" />
        </div>
        <div>
            <label class="field-lable" for="comment">Ваше имя:</label>
            <textarea name = "comment" id="comment" cols="30" rows="10"></textarea>
        </div>
        <div>
            <input type="submit" value="OK" / >
        </div>
    </form>
<div class="comments">
<? foreach ($allcomments as $comment) {?>

    <div class="comment">
        <div class = "username">
            <?
            echo 'Имя: '.$comment['username'];
            ?>

        </div>
        <div class = "comment">
            <?
            echo 'Комментарий: '.$comment['comment'];
            ?>
        </div>
    </div>

<?} ?>


</div>
</body>
</html>
