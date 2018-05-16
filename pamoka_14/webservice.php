<?php

class Database{
    private $host = "localhost";
    private $db_name = "namudarbai";
    private $username = "root";
    private $password = "";
    public $conn;
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
class Comments
{

    private $db = null;
    public function __construct($db){
        $this->db = $db;
    }


    public function getAllComments(){
        $sql = "SELECT * FROM comments ORDER BY id DESC LIMIT 1000";
        $sth = $this->db->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }
}
$database = new Database();
$db = $database->getConnection();
$comment = new Comments($db);
$allCom = $comment->getAllComments();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
echo json_encode($allCom);

