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
        $data = [];
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        $data['email'] = $_POST['email'];
        $data['name'] =$_POST['name'];


        pushUser($data);
    endif;

    function pushUser($data){
        $sql = "INSERT INTO users (username, password, email, name) VALUES (:username, :password, :email, :name)";
        $sth = getDb()->prepare($sql);

        $sth->execute([
            'username'=>$data['username'],
            'password'=>$data['password'],
            'email'=>$data['email'],
            'name'=>$data['name']
        ]);
    }

header("Location:login.php");