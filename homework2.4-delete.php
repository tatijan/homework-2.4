<?php
require_once 'core.php';
if (!isAuthorized())
{
    location('index');
}
$file_list = glob('uploads/*.json');
foreach ($file_list as $key => $file) {
    if ($key == $_GET['test']) {
        unlink($file);
        location('list');
    }
}