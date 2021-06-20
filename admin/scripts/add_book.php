<?php
if (empty($_COOKIE['login'])) {
    header('Location: auth/login.php');
}

require_once '../../db/db_connection.php';

if (!empty($_POST)) {

    $title = !empty($_POST["title"]) ? $_POST["title"] : '';
    $public_year = !empty($_POST["public_year"]) ? $_POST["public_year"] : '';
    $amount = !empty($_POST["amount"]) ? $_POST["amount"] : '';

    function addToTableBook(object $pdo, string $title, string $public_year, string $amount): void
    {
        $query = "INSERT INTO book (title, public_year, amount) VALUES (?, ?, ?)";
        $statement = $pdo->prepare($query);
        $statement->execute([$title, $public_year, $amount]);
    }

    addToTableBook($pdo, $title, $public_year, $amount);

    function extractBookId(object $pdo, string $title): array
    {
        $query = "SELECT book_id FROM book WHERE title = ?";
        $statement = $pdo->prepare($query);
        $statement->execute([$title]);
        $arr = $statement->fetchAll();

        return $arr;
    }

    $bookId = extractBookId($pdo, $title);
    $bookId = $bookId[0]["book_id"];

    $authors = !empty($_POST["authors"]) ? $_POST["authors"] : '';
    $authors = explode(", ", $authors);

    function extractAuthorName(object $pdo, string $author): array
    {
        $query = "SELECT author_name FROM author WHERE author_name = ?";
        $statement = $pdo->prepare($query);
        $statement->execute([$author]);
        $authorName = $statement->fetchAll();

        return $authorName;
    }

    function addAuthor(object $pdo, string $author): void
    {
        $query = "INSERT INTO author (author_name) VALUES (?)";
        $statement = $pdo->prepare($query);
        $statement->execute([$author]);
    }

    function extractAuthorId(object $pdo, string $author): array
    {
        $query = "SELECT author_id FROM author WHERE author_name = ?";
        $statement = $pdo->prepare($query);
        $statement->execute([$author]);
        $authorId = $statement->fetchAll();

        return $authorId;
    }
    
    foreach ($authors as $author) {
        $authorName = extractAuthorName($pdo, $author);

        if (empty($authorName)) {
            addAuthor($pdo, $author);
        }

        $authorId = extractAuthorId($pdo, $author);
        $authorsId[] = $authorId[0]["author_id"];
    }

    function addAuthorsId(object $pdo, string $bookId, array $authorsId): void 
    {
        foreach ($authorsId as $authorId) {
            $query = "INSERT INTO book_author (book_id, author_id) VALUES (?, ?)";
            $statement = $pdo->prepare($query);
            $statement->execute([$bookId, $authorId]);
        }
    }

    addAuthorsId($pdo, $bookId, $authorsId);


    $genres = !empty($_POST["genres"]) ? $_POST["genres"] : '';
    $genres = explode(", ", $genres);

    function extractGenreName(object $pdo, string $genre): array
    {
        $query = "SELECT genre_name FROM genre WHERE genre_name = ?";
        $statement = $pdo->prepare($query);
        $statement->execute([$genre]);
        $genreName = $statement->fetchAll();

        return $genreName; 
    }

    function addGenre(object $pdo, string $genre): void 
    {
        $query = "INSERT INTO genre (genre_name) VALUES (?)";
        $statement = $pdo->prepare($query);
        $statement->execute([$genre]);
    }

    function extractGenreId(object $pdo, string $genre): array
    {
        $query = "SELECT genre_id FROM genre WHERE genre_name = ?";
        $statement = $pdo->prepare($query);
        $statement->execute([$genre]);
        $genreId = $statement->fetchAll();

        return $genreId;
    }
        
    foreach ($genres as $genre) {
        $genreName = extractGenreName($pdo, $genre);

        if (empty($genreName)) {
            addGenre($pdo, $genre);
        }

        $genreId = extractGenreId($pdo, $genre);
        $genresId[] = $genreId[0]["genre_id"];
    }

    function addGenresId(object $pdo, string $bookId, array $genresId): void 
    {
        foreach ($genresId as $genreId) {
            $query = "INSERT INTO book_genre (book_id, genre_id) VALUES (?, ?)";
            $statement = $pdo->prepare($query);
            $statement->execute([$bookId, $genreId]);
        }
    }

    addGenresId($pdo, $bookId, $genresId);

    header("Location: admin.php");
}