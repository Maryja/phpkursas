<?php

function getDb()
{
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "namudarbai";
    $dsn = "mysql:host=$host;dbname=$db";
    return new PDO($dsn, $user, $password);
}


$sql = "SELECT marks.mark,
        students.forename,
        students.surname,
        modules.module_name
        FROM marks
        LEFT JOIN students
        ON marks.student_no = students.student_no
        LEFT JOIN modules
        ON marks.module_code = modules.module_code ";

$result = getDb()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

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
<h2>Search students :</h2>
<form action="" method="get">
    <input type="text" name="keyword">
    <input type="submit" value="Search...">
</form>
<?php
//search form
        if (isset($_GET['keyword'])):
        $keyword = $_GET['keyword'];
        $sql = "SELECT marks.mark,
        students.forename,
        students.surname,
        modules.module_name
        FROM marks
        LEFT JOIN students
        ON marks.student_no = students.student_no
        LEFT JOIN modules
        ON marks.module_code = modules.module_code
        WHERE forename LIKE :keyword OR  surname LIKE :keyword OR module_name LIKE :keyword";
        $sth = getDb()->prepare($sql);
        $sth->execute([
    'keyword' => "%" . $keyword . "%"
]);
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);


if (count($res) > 0 && !empty($_GET['keyword'])): ?>
    <h1>Results: </h1>
    <?php
    echo "<table style='border: 1px solid blue'>";
foreach ($res as $key => $value):
    echo "<tr>";
    echo "<td style=\"border:1px solid aqua\">" . $value['mark'] . "</td>";
    echo "<td style=\"border:1px solid aqua\">" . $value['module_name'] . "</td>";
    echo "<td style=\"border:1px solid aqua\">" . $value['forename'] . "</td>";
    echo "<td style=\"border:1px solid aqua\">" . $value['surname'] . "</td>";
    echo "</tr>";
    endforeach;
    echo "</table>";
    ?>

<?php endif;?>


<?php endif; ?>


<table style="border:1px solid aqua">
    <tr>
        <th style="border:1px solid blue; background:cornflowerblue">Mark</th>
        <th style="border:1px solid blue; background:cornflowerblue">Module_name</th>
        <th style="border:1px solid blue; background:cornflowerblue">Forename</th>
        <th style="border:1px solid blue; background:cornflowerblue">Surname</th>
    </tr>

    <?php
    //table form
    foreach ($result as $key => $value):


        echo "<tr>";
        echo "<td style=\"border:1px solid aqua\">" . $value['mark'] . "</td>";
        echo "<td style=\"border:1px solid aqua\">" . $value['module_name'] . "</td>";
        echo "<td style=\"border:1px solid aqua\">" . $value['forename'] . "</td>";
        echo "<td style=\"border:1px solid aqua\">" . $value['surname'] . "</td>";
        echo "</tr>";


    endforeach; ?>


</table>

</body>
</html>
