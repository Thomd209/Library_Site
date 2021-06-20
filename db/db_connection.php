<?php

$host = 'localhost';
$db = 'new_library';
$charset = 'utf8';
$user = 'thomd729';
$pass = 'FI]??{7qF';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];


$pdo = new PDO($dsn, $user, $pass);