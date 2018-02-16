<?php
require_once __DIR__ . '/../src/functions.php';
if (!isset($_SESSION['admin'])) {
    header("Refresh: 2; url='index.php'");
    echo 'нет доступа';
    exit;
}
array_map('unlink', glob("../Tests/*"));
redirect('list');
