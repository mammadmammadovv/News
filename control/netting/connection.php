<?php 
$dsn = "mysql:host=localhost;dbname=porto";
$username = "root";
$password = "";

try {
    $db = new PDO($dsn, $username, $password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $db-> exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
    // echo "success";
} catch (\PDOException $e) {
    echo $e->getMessage();
}

?>