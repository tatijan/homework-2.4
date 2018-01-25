<?php
require_once 'core.php';
if (isAuthorized())
{
    location('admin');
}
if (!empty($_GET['user_name'])) {
    setcookie('user_name', $_GET['user_name']);
    location('list');
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная страница</title>
</head>
<body>
<h1>Добро пожаловать в тесты</h1>
<form method="get">
    <label>Введите ваше имя: </label>
    <input type="text" name="user_name"> <button type="submit">Продолжить</button>
</form>
<br><br><br>
<a href="login.php">Вход для администратора</a>
</body>
</html>
