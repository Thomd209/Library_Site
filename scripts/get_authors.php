<?php

require_once 'db/db_connection.php';

function getAuthors(object $pdo): object
{
    $query = 'SELECT author.author_id, author.author_name, GROUP_CONCAT(book.title SEPARATOR ", ") AS books 
        FROM author LEFT JOIN book_author ON author.author_id = book_author.author_id 
        LEFT JOIN book ON book_author.book_id = book.book_id
        GROUP BY author.author_id, author.author_name ORDER BY author.author_name';
    
    $authors = $pdo->query($query);

    return $authors;
}

$authors = getAuthors($pdo);