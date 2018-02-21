<?php
session_start();
define('USERS_FILE', __DIR__ . '/../data/users.json');
function isPost() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
function getParam($name) {
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : null;
}
function login($login, $password) {
    $user = getUser($login);
    if (!$user || $user['password'] != $password) {
        return false;
    } else {
        unset($user['password']);
        $_SESSION['user'] = $user;
        return true;
    }
}
function getUsers() {
    if (!file_exists(USERS_FILE)) {
        return [];
    }
    $fileData = file_get_contents(USERS_FILE);
    $users = json_decode($fileData, true);

    if (!$users) {
        return [];
    }
    return $users;
}
function getUser($login) {
    $users = getUsers();
    foreach($users as $user) {
        if($user['login'] == $login) {
            return $user;
        }
    }
    return null;
}
function redirect($page) {
    header("Location: $page.php");
    die;
}
function getAuthorizedUser() {
    return isset($_SESSION['user']) ? $_SESSION['user'] : null;
}
function logout() {
    session_destroy();
    redirect('index');
}