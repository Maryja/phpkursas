<?php

session_start();

$name = $_POST['username'];
    $_SESSION['message'] = $name;
    
    header("Location: index.php");



?>

