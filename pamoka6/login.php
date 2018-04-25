<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<div class="container">

    <form method="POST">

        <input type="text" name="username">
        <input type="password" name="password">
        <input type="submit" value="Prisijungti" name="login">


    </form>
<?php

if(isset($_POST['login'])):

 login();

endif;

    function getDb(){
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "namudarbai";
    $dsn = "mysql:host=$host;dbname=$db";
    return new PDO($dsn, $user, $password);
    }
function login()
{
    $sql = "SELECT * FROM users";
    $sth = getDb()->query($sql);

    $form_name = $_POST['username'];
    $form_pass = $_POST['password'];

    foreach ($sth as $value):
        if ($value['username'] == $form_name && $value['password'] == $form_pass):
            echo "<h2>Prisijungti pavyko</h2>";

        else:

            echo "<h2>Klaida</h2>";
        endif;
    endforeach;

}
?>

</div>

</body>
</html>