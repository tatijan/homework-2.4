<?php
require_once"functions.php";
if (!isset($_SESSION['admin'])) {
    header("Refresh: 2; url='index.php'");
    echo 'нет доступа';
    exit;
}
array_map('unlink', glob("../Tests/*"));
redirect('list');
