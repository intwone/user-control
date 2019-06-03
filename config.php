<?php

$dsn = "mysql:dbname=lesson19;host=localhost";
$dbuser = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn, $dbuser, $dbpassword);
} catch(PDOexception $e) {
    echo "ERROR: ".$e->getMessage();
}

?>