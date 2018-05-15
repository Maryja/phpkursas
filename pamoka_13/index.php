<?php

$url= "https://api.chucknorris.io/jokes/random";

$result = [];


function getDb()
{
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "namudarbai";
    $dsn = "mysql:host=$host;dbname=$db";
    return new PDO($dsn, $user, $password);
}

for($i=0;$i<5;$i++):
    $result[$i] = json_decode(file_get_contents($url));



    $sql = "INSERT INTO chuck (id,value) VALUES (:id,:value)";

    $sth = getDb()->prepare($sql);



    $sth->execute($data= [
        'id' => $result[$i]->id,
        'value' => $result[$i]->value
    ]
    );
    endfor;

