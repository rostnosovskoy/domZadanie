<!--//Формы , $_GET, $_POST, $_REQUEST. Пишем контактную форму (для сообщений пользователей) –-->
<!--//сериализация, хранение в файле, вывод комментариев под формой, «антимат» для комментариев.-->
<!--//-->
<?
//header('Location: http://localhost/functions_p2/10/comments.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>

<div class="spaces">
    <form action="" method="post">

            <label for="userName">Enter name:</label>
        <div class="spaces">
            <input type="text" id="userName" name="userName"  />
        </div>
        <label for="email">Enter email:</label>
        <div class="spaces">
            <input type="email" id="email" name="email"  />
        </div>
        <label for="msg">Enter text:</label>
        <div class="spaces">
            <textarea id="msg" name = "msg" rows="10" cols="30"></textarea>
        </div>
        <input type="submit" name = "post" value="Post" />
    </form>
</div>

<div class="spaces">
    <?
    define('POST_NAME','Posts.txt');
    if (isset($_POST['userName']))
        $userName = $_POST['userName'];
    else
        $userName = "Anonimous";
    if (isset($_POST['email']))
        $email = $_POST['email'];
    else {
        echo "Enter the email field.";
        exit();
    }
    if (isset($_POST['msg']))
        $message = $_POST['msg'];
    else {
        echo "Enter the text in text field.";
        exit();
    }
    date_default_timezone_set('Europe/Riga'); //-------Set timezone for Kyev---------------
    $datePost = date('d-m-Y H:i:s'); //------------Set date format---------------------

    $userNameFun = function ($message)
    {
        $res = str_replace([" ", "\r", "\n", "\t", "\x0B"], [" ", "", "<br />", "&nbsp&nbsp&nbsp&nbsp", ""],$message);
        return $res;
    };

    if (strip_tags($userName))
        $userName = strip_tags($userName, "<br /><b></b><i></i>");
    elseif (is_string($userName))
    {
        $userName = trim($userName);
    }
    else {
        $userName = settype($userName, 'string');
        $userName = trim($userName);
    }
    if (strip_tags($email))
        $email = strip_tags($email, "<br /><b></b><i></i>");
    elseif (is_string($email))
    {
        $email = trim($userName);
    }
    else {
        $userName = settype($userName, 'string');
        $email = trim($email);
    }
    if (strip_tags($message))
        $message = strip_tags($message, "<br /><b></b><i></i>");
    elseif (is_string($message))
    {
        $message = trim($message);
    }
    else {
        $message = settype($message, 'string');
        $message = trim($message);
    }
    $datePost = (string)$datePost;
    $arrFromFile = ["<i>".$datePost."</i>", $userNameFun("<b>".$userName."</b>"), "<i>".$userNameFun($email)."</i>", $userNameFun($message)];
    $formatUserName = serialize($arrFromFile);
    if (file_exists(POST_NAME)) {
        file_put_contents(POST_NAME, "\n".$formatUserName, FILE_APPEND);
    }
    else
    {
        $fd = fopen(POST_NAME, "w");
        fclose($fd);
    }
    if (file_exists(POST_NAME)) {
        $getStrFromFile = file(POST_NAME,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($getStrFromFile as $str) {
            $str = unserialize($str);
            foreach ($str as $item) {
                $item = strip_tags($item, "<br /><b></b><i></i>");
                echo $item. "<br />";
            }
            echo "<hr />";
        }
    }
    header ("Location: http://localhost/functions_p2/10/comments.php");
    exit();

    ?>
</div>

</body>
</html>

<?php




