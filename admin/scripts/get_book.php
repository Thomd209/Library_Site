<?php

require_once '../db/db_connection.php';

$book_id = !empty($_GET["book_id"]) ? $_GET["book_id"] : '';

function getBook(object $pdo, string $book_id): array
{
    $query = "SELECT book.book_id, book.title, book.public_year, book.amount, author.author_name AS author, 
        GROUP_CONCAT(genre.genre_name SEPARATOR ', ') AS genres FROM author JOIN book_author 
        ON author.author_id = book_author.author_id JOIN book ON book_author.book_id = book.book_id 
        JOIN book_genre ON book.book_id = book_genre.book_id JOIN genre 
        ON book_genre.genre_id = genre.genre_id WHERE book.book_id = ?
        GROUP BY book.book_id, book.title, book.public_year, book.amount, author";

    $statement = $pdo->prepare($query);
    $statement->execute([$book_id]);

    $book = $statement->fetchAll();

    return $book;
}

$book = getBook($pdo, $book_id);