<?php

require_once 'db/db_connection.php';

$booksQuery = "SELECT book.title, book.public_year, book.amount, author.author_name AS author, 
               GROUP_CONCAT(genre.genre_name SEPARATOR ', ') AS genres FROM author JOIN book_author 
               ON author.author_id = book_author.author_id JOIN book ON book_author.book_id = book.book_id 
               JOIN book_genre ON book.book_id = book_genre.book_id JOIN genre 
               ON book_genre.genre_id = genre.genre_id 
               GROUP BY book.title, book.public_year, book.amount, author ORDER BY author.author_name";

$books = $pdo->query($booksQuery);