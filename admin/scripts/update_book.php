<?php
if (empty($_COOKIE['login'])) {
    header('Location: auth/login.php');
}

require_once '../../db/db_connection.php';

$book_id = !empty($_GET["book_id"]) ? $_GET["book_id"] : '';

if (!empty($_POST)) {

    $title = !empty($_POST["title"]) ? $_POST["title"] : '';
    $public_year = !empty($_POST["public_year"]) ? $_POST["public_year"] : '';
    $amount = !empty($_POST["amount"]) ? $_POST["amount"] : '';

    function updateBook(object $pdo, string $title, string $public_year, string $amount, string $book_id): void
    {
        $query = "UPDATE book SET title = ?, public_year = ?, amount = ? WHERE book_id = ?";
        $statement = $pdo->prepare($query);
        $statement->execute([$title, $public_year, $amount, $book_id]);
    }

    updateBook($pdo, $title, $public_year, $amount, $book_id);


    $authors = !empty($_POST["authors"]) ? $_POST["authors"] : '';
    $authors = explode(", ", $authors); 

    function getAuthorsId($pdo, $book_id): array 
    {
        $query = "SELECT author_id FROM book_author WHERE book_id = ?";
        $statement = $pdo->prepare($query);
        $statement->execute([$book_id]);

        $authors_id = $statement->fetchAll();

        return $authors_id;
    }

    $authors_id = getAuthorsId($pdo, $book_id);

    function updateAuthors(object $pdo, array $authors, array $authors_id): void
    {
        for ($i = 0; $i < count($authors); $i++) {
            $author = $authors[$i];
            $author_id = $authors_id[$i][0];

            $query = "UPDATE author SET author_name = ? WHERE author_id = ?";
            $statement = $pdo->prepare($query);
            $statement->execute([$author, $author_id]);
        }
    }

    updateAuthors($pdo, $authors, $authors_id);


    $genres = !empty($_POST["genres"]) ? $_POST["genres"] : '';
    $genres = explode(", ", $genres);

    function getGenresId($pdo, $book_id): array
    {
        $query = "SELECT genre_id FROM book_genre WHERE book_id = ?";
        $statement = $pdo->prepare($query);
        $statement->execute([$book_id]);
        $genres_id = $statement->fetchAll();

        return $genres_id;
    }

    $genres_id = getGenresId($pdo, $book_id);
    
    function updateGenres(object $pdo, array $genres, array $genres_id): void
    {
        for ($i = 0; $i < count($genres); $i++) {
            $genre = $genres[$i];
            $genre_id = $genres_id[$i][0];

            $query = "UPDATE genre SET genre_name = ? WHERE genre_id = ?";
            $statement = $pdo->prepare($query);
            $statement->execute([$genre, $genre_id]);
        }
    }

    updateGenres($pdo, $genres, $genres_id);

    header("Location: ../admin.php");
}