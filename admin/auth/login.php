<?php
require_once 'auth.php';

if (!empty($_POST)) {
    $login = !empty($_POST['login']) ? $_POST['login'] : '';
    $pass = !empty($_POST['pass']) ? $_POST['pass'] : '';

    if (checkAuth($login, $pass)) {
        setcookie('login', $login, 0, '/');
        setcookie('password', $pass, 0, '/');
        header('Location: ../admin.php');
    } else {
        $error = 'Связка логин-пароль является неправильной';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница входа на сайт библиотеки</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/admin/login.css">
</head>
<body>
    <h3 class="sign-in-title">Форма для входа в панель администратора сайта</h3>
    <form class="form-sign-in" action='login.php' method='POST'>
        <label class="label-sign-in" for="login">Логин:</label>
        <input class="input-sign-in" type="text" name='login' id='login'>
        <label class="label-sign-in" for="pass">Пароль:</label>
        <input class="input-sign-in" type="password" name='pass' id='pass'>
        <button type="submit" class="btn-dark btn-submit">Войти</button>
    </form>
    <span class="text-error"><?= $error = !empty($error) ? $error : '' ?></span>
</body>
</html>