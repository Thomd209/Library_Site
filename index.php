<?php

require_once 'scripts/get_amount.php';

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница сайта</title>
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/sign-in.css">
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
                    <ul class="navbar-nav mr-auto">
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
        <div class="info-block container-fluid">
            <h2>Добро пожаловать на сайт нашей библиотеки!</h2>
            <p class="info-text">Здесь Вы можете посмотреть все книги, которые есть у нас в наличии. Также на нашем сайте есть информация о авторах, жанрах, количестве, количестве дней проката и стоимости проката каждой книги.</p>
            <span class="text-rent">Максимальное количество дней проката: 14</span>
            <span class="text-rent">Стоимость проката за один день: 10 руб.</span>
            <span class="text-quantity">Всего книг в библиотеке: <?= $booksAmount['booksAmount'] ?></span>
            <span class="text-quantity">Всего авторов: <?= $authorsAmount['authorsAmount'] ?></span>
            <span class="text-quantity">Всего жанров: <?= $genresAmount['genresAmount'] ?></span>
        </div>
    </div>
    <?php require_once 'templates/footer.php'; ?>
</body>
</html>