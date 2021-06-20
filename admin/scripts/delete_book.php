<?php

require_once '../../db/db_connection.php';

$bookId = !empty($_GET["book_id"]) ? $_GET['book_id'] : '';

function deleteBook(object $pdo, string $bookId): void
{
    $query = 'DELETE FROM book WHERE book_id = ?';
    $statement = $pdo->prepare($query);
    $statement->execute([$bookId]);
}

deleteBook($pdo, $bookId);

header('Location: ../admin.php');