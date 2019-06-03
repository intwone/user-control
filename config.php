<?php

$dsn = "mysql:dbname=lessons;host=localhost";
$dbuser = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn, $dbuser, $dbpassword);
} catch(PDOexception $e) {
    echo "ERROR: ".$e->getMessage();
}

?>