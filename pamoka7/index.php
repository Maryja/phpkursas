<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="" method="POST">

<h1>My friends:</h1>

    <input type="text" name="name" placeholder="Friends name">
    <input type="submit" name="submit" value="ADD">


</form>

<?php
function getDb(){
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "namudarbai";
    $dsn = "mysql:host=$host;dbname=$db";
    return new PDO($dsn, $user, $password);
}

if(isset($_POST['submit'])):
$data =[];
$data['name'] = $_POST['name'];

pushName($data);

endif;

function pushName($data){

    $sql = "INSERT INTO friends (name) VALUES (:name) ";

    $sth = getDb()->prepare($sql);

    $data = [
        'name' => $data['name']
    ];
    $sth->execute($data);

}

?>
<h2>Insert tel.number:</h2><br>


<form action="" method="POST">
    <?php
    echo '<select name="select1">';

    $sql = "SELECT * FROM friends";
    $sth = getDb()->query($sql);
    $row = $sth->fetch();
    do{
        $n = $row['name'];
        $id = $row['id'];

        printf ("<option value='$id'>%s</option>",$n);

    }
    while($row = $sth->fetch());

    echo "</select>";

    ?>
    <input type="number" name="number">
    <input type="submit" name="submit2" value="ADD">

</form>
<?php

        if (isset($_POST['submit2'])):

$data =[];
$data['number'] = $_POST['number'];
$data['parent_id'] = $_POST['select1'];


//var_dump($data);

pushNumber($data);
endif;


function pushNumber($data){

    $sql = "INSERT INTO numbers (number,parent_id) VALUES (:number, :parent_id)";
    $sth = getDb()->prepare($sql);
    $data = [
        'number' => $data['number'],
        'parent_id' => $data['parent_id']
    ];
    $sth->execute($data);

}
?>
</body>
</html>