<?php

require_once '../../db/db_connection.php';

$bookId = !empty($_GET["author_id"]) ? $_GET["author_id"] : '';

function deleteAuthor(object $pdo, string $bookId): void
{
    $query = "DELETE FROM author WHERE author_id = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$bookId]);
}

deleteAuthor($pdo, $bookId);

header('Location: ../authors.php');