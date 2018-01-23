<?php

$file = 'words.txt';

$words = '';
if (file_exists($file)) {
    $words = file_get_contents($file);
}

if (isset($_POST['words'])) {
    $words = $_POST['words'];
    file_put_contents($file, $words);
}




?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <textarea name="words" id="" cols="30" rows="10"><?=$words?></textarea>
    <input type="submit" value="Save">
</form>
</body>
</html>


[9:08]
-------------------
comments.php
<?php
define('FILE_NAME', 'data.txt');

$allComments = [];

if (file_exists(FILE_NAME)) {
    $oldSerializedComments = file_get_contents(FILE_NAME);
    $allComments = unserialize($oldSerializedComments);
}








$comment = [];
if (isset($_POST['username'])) {
    $comment['username'] = $_POST['username'];
}

if (isset($_POST['comment'])) {
    $comment['comment'] = $_POST['comment'];
}

if (isset($_POST['username']) and  isset($_POST['comment'])) {
    $allComments[] = $comment;
}




$serializedComments = serialize($allComments);

file_put_contents(FILE_NAME, $serializedComments);








function escape($str) {

    $badWords = file_get_contents('words.txt');
    $badWords = explode(',', $badWords);


    foreach ($badWords as $i => $badWord) {
        $badWords[$i] = trim($badWord);
    }


    return htmlspecialchars(str_ireplace($badWords, '***', $str) );
}

function echoCommentBlock(array $comment) {
    echo '
       <div class="comment">
           <div class="username">
               Имя: '. escape($comment['username']) . '
           </div>
           <div class="comment">
               Комментарий: '.escape($comment['comment'] ) . '
           </div>
       </div>';
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        .field-label {
            width: 115px;
            font-weight: bold;
            display: inline-block;
            margin: 15px;
        }
        .comment {
            background: #eee;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<form action="" method="post">

    <div>
        <label class="field-label" for="username">Ваше имя:</label>
        <input type="text" id="username" name="username">
    </div>

    <div>
        <label class="field-label" for="comment">Комментарий:</label>
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
    </div>

    <div>
        <input type="submit" value="OK">
    </div>

</form>

<div class="comments">

    <? foreach ($allComments as $comment) {
        echoCommentBlock($comment);
    } ?>


</div>

</body>
</html>