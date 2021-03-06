
<?php

class DB
{
    function getDb()
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $db = "namudarbai";
        $dsn = "mysql:host=$host;dbname=$db";
        return new PDO($dsn, $user, $password);
    }

}


class Student extends DB
{

   public $student_no = null;
   public $surname = null;
   public $forename = null;


    function __construct($student_no,$surname,$forename)
    {
        $this->student_no = $student_no;
        $this->surname = $surname;
        $this->forename = $forename;
    }

    public function save(){

        $sql = "INSERT INTO students (student_no,surname,forename) VALUES (:student_no, :surname, :forename) ";

        $sth = $this->getDb()->prepare($sql);
        $sth->execute($data = [
                'student_no' => $this->student_no,
                'surname' => $this->surname,
                'forename' => $this->forename
        ]);

    }
}

$bob = new Student(123456,"Boby","Like");
$bob->save();

class Modules extends DB
{


        public $module_name = null;
        public $module_code = null;

    function __construct($module_code,$module_name)
    {
        $this->module_code = $module_code;
        $this->module_name = $module_name;

    }

   public function save(){
        $sql = "INSERT INTO modules (module_code, module_name) VALUES (:module_code, :module_name)";

        $sth = $this->getDb()->prepare($sql);
        $sth->execute($data = [
            'module_code' => $this->module_code,
            'module_name' => $this->module_name
        ]);
    }
}

$maths = new Modules(20158, "Math");
$maths->save();

class Marks extends DB
{

    public $student_no = null;
    public $module_code = null;
    public $mark = null;

    function __construct($student_no,$module_code,$mark)
    {
        $this->student_no = $student_no;
        $this->module_code = $module_code;
        $this->mark = $mark;
    }

    public function save(){
        $sql = "INSERT INTO marks (student_no, module_code, mark) VALUES (:student_no, :module_code, :mark)";

        $sth = $this->getDb()->prepare($sql);
        $sth->execute($data = [
             'student_no' => $this->student_no,
            'module_code' => $this->module_code,
            'mark' => $this->mark
        ]);
    }
}

$mark = new Marks(123456,20158,10);
$mark->save();
?>
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




</body>
</html>
