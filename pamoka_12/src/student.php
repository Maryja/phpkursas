<?php



namespace Student;

use PDO;g
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

    protected $student_no = null;
    protected $surname = null;
    protected $forename = null;


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

