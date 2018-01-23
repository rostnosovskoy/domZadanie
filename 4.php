<pre>
<?php
session_start();

function getComments(){
    $comments = [];
    if (isset($_SESSION['comments']))
    {
        $comments = $_SESSION['comments'];
    }
}

function addComment()
{
    if (!isset($_SESSION['comments']))
    {
       $_SESSION['comments'] = [];
    }
    $_SESSION['comments'][] = $text;
}

$comment = @$_POST['comment'];

addComment

?>