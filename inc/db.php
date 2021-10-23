<?php


$db = "blog";
$host = "localhost";
$user = "root";
$password = "";

try {
    $dsn = "mysql:host=" . $host . ";dbname=" . $db;
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $e) {
    echo ("Error occured " . "<br/>" . $e->getMessage());
}
