<?php

require_once '../../db/db_connection.php';

$genreId = !empty($_GET['genre_id']) ? $_GET['genre_id'] : '';

function deleteGenre(object $pdo, string $genreId): void
{
    $query = 'DELETE FROM genre WHERE genre_id = ?';
    $statement = $pdo->prepare($query);
    $statement->execute([$genreId]);
}

deleteGenre($pdo, $genreId);

header('Location: ../genres.php');