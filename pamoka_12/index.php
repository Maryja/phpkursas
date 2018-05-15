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





<table style="border:1px solid aqua">
    <tr>
        <th style="border:1px solid blue; background:cornflowerblue">Mark</th>
        <th style="border:1px solid blue; background:cornflowerblue">Module_name</th>
        <th style="border:1px solid blue; background:cornflowerblue">Forename</th>
        <th style="border:1px solid blue; background:cornflowerblue">Surname</th>
    </tr>

    <?php



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

    foreach ($result as $key => $value):


        echo "<tr>";
        echo "<td style=\"border:1px solid aqua\">" . $value['mark'] . "</td>";
        echo "<td style=\"border:1px solid aqua\">" . $value['module_name'] . "</td>";
        echo "<td style=\"border:1px solid aqua\">" . $value['forename'] . "</td>";
        echo "<td style=\"border:1px solid aqua\">" . $value['surname'] . "</td>";
        echo "</tr>";


    endforeach; ?>


</table>


<?php

require "vendor/autoload.php";


use src\Students;
use src\Modules;
use src\Marks;


$Mary = new \Student\Student(205868,"Marija","Nevdach");
$Mary->save();



?>

</body>
</html>
