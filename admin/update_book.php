<?php
    require_once 'scripts/get_book.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора сайта</title>
    <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/admin/logout.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/admin/update_book.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
</head>
<body>
    <div class="content">
        <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
            <div class="container-fluid">
                <a class="navbar-brand" href="admin.php">Панель управления сайтом</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="admin.php">Книги</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="authors.php">Авторы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="genres.php">Жанры</a>
                        </li>
                        <li class="nav-item">
                        <a class="sign-in-link nav-link" href="auth/logout.php">Выйти</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <h2>Форма обновления книги</h2>
            <?php foreach ($book as $field): ?>
            <form action="scripts/update_book.php?book_id=<?= $_GET["book_id"] ?>" method="POST">
                <label class="update-book-label" for="title">Название:</label>
                <input class="update-book-input" type="text" name="title" value="<?= $field["title"] ?>" id="title">

                <label class="update-book-label" for="publc_year">Год публикации:</label>
                <input class="update-book-input" type="text" name="public_year" value="<?= $field["public_year"] ?>" id="public_year">

                <label class="update-book-label" for="amount">Количество:</label>
                <input class="update-book-input" type="text" name="amount" value="<?= $field["amount"] ?>" id="amount">

                <label class="update-book-label" for="authors">Авторы:</label>
                <span>Данное поле заполняется в следующем формате: Жюль Верн, Александр Дюма, Лев Толстой...</span>
                <textarea class="update-book-input" name="authors" cols=80 id="authors"><?= $field["author"] ?></textarea>

                <label class="update-book-label" for="genres">Жанры:</label>
                <span class="genres-warning">Данное поле заполняется в следующем формате: Роман, рассказ, повесть...</span>
                <textarea class="update-book-input" name="genres" cols=80 id="genres"><?= $field["genres"] ?></textarea>

                <button class="btn-submit btn btn-primary" type="submit">Обновить книгу</button>
            </form>
            <?php endforeach; ?>
        </div>
    </div>
    <footer class="footer bg-secondary">
        <div class="container-fluid">
            <span class="copyright">&copy; 2021 Сайт библиотеки</span>
        </div>
    </footer>
</body>
</html>