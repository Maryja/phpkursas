<?php
namespace Modules;

use PDO;
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


class Modules extends DB
{
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


