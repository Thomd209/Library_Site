<?php

require_once '../../db/db_connection.php';

$query = 'SELECT * FROM admin';
$pdoState = $pdo->query($query);
$row = $pdoState->fetch();
$dbLogin = $row['login'];
$dbPass =  $row['password'];

function checkAuth(string $login, string $pass) {
    global $dbLogin, $dbPass;
    if ($login === $dbLogin && password_verify($pass, $dbPass)) {
        return True;
    } 

    return False;
}