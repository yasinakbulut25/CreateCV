<?php !defined("index") ? header("location: hata") : null ?>
<?php

try {

    $host = 'localhost';
    $dbname = '#YOUR_DATABASE#';
    $user = 'root';
    $password = '';

    $data = new PDO("mysql:host=$host;dbname=$dbname; charset=utf8mb4;", "$user", "$password");

}catch(PDOException $mesaj){

    echo $mesaj -> getMessage();

}
?>
