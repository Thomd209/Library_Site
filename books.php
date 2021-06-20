<?php

require_once 'scripts/get_books.php';

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Книги</title>
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/sign-in.css">
    <link rel="stylesheet" href="assets/css/books.css">
    <link rel="stylesheet" href="assets/css/footer.css">
</head>
<body>
    <div class="content">
        <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Сайт библиотеки</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="books.php">Все книги</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="authors.php">Все авторы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="genres.php">Все жанры</a>
                        </li>
                        <li class="nav-item">
                            <a class="sign-in-link nav-link" href="admin/auth/login.php">Войти в систему</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <h2>Книги</h2>
            <p class="info-text">На этой странице Вы можете посмотреть все книги, которые есть в нашей библиотеке, а также информацию о них.</p>
            <?php foreach ($books as $book): ?>
            <ul class="book-list">
                <li class="book-list__item">
                    <span class="book-list__explanation">Название:</span>
                    <span class="book-list__book-info"><?= $book["title"] ?></span>
                </li>
                <li class="book-list__item">
                    <span class="book-list__explanation">Авторы:</span>
                    <span class="book-list__book-info"><?= $book["author"] ?></span>
                </li>
                <li class="book-list__item">
                    <span class="book-list__explanation">Год публикации:</span>
                    <span class="book-list__book-info"><?= $book["public_year"] ?></span>
                </li>
                <li class="book-list__item">
                    <span class="book-list__explanation">Количество:</span>
                    <span class="book-list__book-info"><?= $book["amount"] ?></span>
                </li>
                <li class="book-list__item">
                    <span class="book-list__explanation">Жанры:</span>
                    <span class="book-list__book-info"><?= $book["genres"] ?></span>
                </li>
            </ul>
            <?php endforeach; ?>
        </div>
    </div>
    <?php require_once 'templates/footer.php'; ?>
</body>
</html>