<?php

if (empty($_COOKIE['login'])) {
    header('Location: auth/login.php');
}

require_once '../db/db_connection.php';

function getGenres(object $pdo): object
{
    $query = "SELECT genre.genre_id, genre.genre_name, GROUP_CONCAT(book.title SEPARATOR ', ') AS genres
        FROM genre LEFT JOIN book_genre ON genre.genre_id = book_genre.genre_id 
        LEFT JOIN book ON book_genre.book_id = book.book_id GROUP BY genre.genre_id, genre.genre_name 
        ORDER BY genre.genre_name";

    $genres = $pdo->query($query);

    return $genres;
}

$genres = getGenres($pdo);