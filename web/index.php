<?php
error_reporting(E_ALL);
require_once __DIR__ . '/../src/functions.php';
// print_r($_SESSION);
if (isPost()) {
    if ($_POST['user'] === 'admin') {
        if ( login( getParam('login'), getParam('password') ) ) {
            $_SESSION['userName'] = getAuthorizedUser()['username'];
            $_SESSION['admin'] = true;
            redirect('admin');
        }
    } else {
        $_SESSION['userName'] = $_POST['guest'];
        redirect('list');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Админка</title>
    <style type="text/css">
        input {
            margin-bottom: 10px;
        }
        li {
            list-style-type: none;
        }
    </style>
</head>
<body>
<form method="POST">
    <ul>
        <li class="user">
            <label>
                <input type="radio" name="user" value="admin" checked>
                Авторизоваться как администратор
                <ul>
                    <li><input class="form-control" placeholder="Login" name="login" type="text"></li>
                    <li><input class="form-control" placeholder="Password" name="password" type="password"></li>
                </ul>
            </label>

        </li>
        <li class="user">
            <label>
                <input type="radio" name="user" value="guest">
                Войти как гость
                <ul>
                    <li><input type="text" name="guest" placeholder="Name"></li>
                </ul>
            </label>
        </li>
    </ul>

    <input type="submit" value="Авторизоваться">







</form>
</body>
</html>