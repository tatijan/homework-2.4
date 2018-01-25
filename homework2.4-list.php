<?php
require_once 'core.php';
$file_list = glob('uploads/*.json');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список тестов</title>
</head>
<body>
<h1>Добро пожаловать, <?= userName(); ?></h1>
<p>Выберите тест из списка:</p>
<?php
foreach ($file_list as $key => $file) {
    $file_test = file_get_contents($file);
    $decode_file = json_decode($file_test, true);
    foreach ($decode_file as $test) {
        $question = $test['question'];
        echo "<a href=\"test.php?test=$key\">$question</a>";
        if (isAuthorized()) {
            echo " (<a href=\"delete.php?test=$key\">удалить</a>)";
        }
        echo '<br>';
    }
}
?>
<ul>
    <li><a href="index.php">Главная</a></li>
    <?php if (isAuthorized()) : ?>
        <li><a href="admin.php">Загрузить тест</a></li>
    <?php endif; ?>


</ul>



</body>
</html>