<?php !defined("index") ? header("location: demo") : null ?>

<?php

try {

    $host = 'localhost';
    $dbname = '## DATABASE NAME ##';
    $user = '## DATABASE ADMIN ##';
    $password = '## DATABASE PASSWORD ##';

    $data = new PDO("mysql:host=$host;dbname=$dbname; charset=utf8mb4;", "$user", "$password");

}catch(PDOException $mesaj){

    echo $mesaj -> getMessage();

}
?>
