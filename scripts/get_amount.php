<?php

require_once 'db/db_connection.php';

function getBooksAmount(object $pdo): array
{
    $query = 'SELECT COUNT(*) as booksAmount FROM book';
    $statement = $pdo->query($query);
    $booksAmount = $statement->fetch();

    return $booksAmount;
}

$booksAmount = getBooksAmount($pdo);

function getAuthorsAmount(object $pdo): array
{
    $query = 'SELECT COUNT(*) as authorsAmount FROM author';
    $statement = $pdo->query($query);
    $authorsAmount = $statement->fetch();

    return $authorsAmount;
}

$authorsAmount = getAuthorsAmount($pdo);

function getGenresAmount(object $pdo): array
{
    $query = 'SELECT COUNT(*) as genresAmount FROM genre';
    $statement = $pdo->query($query);
    $genresAmount = $statement->fetch();

    return $genresAmount;
}

$genresAmount = getGenresAmount($pdo);