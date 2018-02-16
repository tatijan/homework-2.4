<?php
error_reporting(E_ALL);
require_once __DIR__ . '/../src/functions.php';
$list = glob('../Tests/*');
if (empty($list)) {
    header("Refresh: 2; url='admin.php'");
    echo 'ни одного теста не загружено';
    exit;
}
if (empty($_SESSION['userName'])) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 403 Forbidden');
    header("Refresh: 2; url='index.php'");
    echo 'необходимо авторизоваться';
    exit;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        * {
            margin: 20px;
        }
    </style>
</head>
<body>

<h1><?php echo $_SESSION['userName'] ?>, выберите тест  </h1>

<form action="test.php" method="GET">
    <label> Выберите номер теста </label>
    <select name="testName" id="testName" size="10">
        <?php
        foreach($list as $id => $file):
            $fileName = pathinfo($file, PATHINFO_FILENAME);
            $baseName = pathinfo($file, PATHINFO_BASENAME) ?>
            <option value="<?= $baseName ?>"> Тест <?= $fileName ?> </option>;
        <?php endforeach ?>
    </select>
    <input type="submit" value="Send">
</form>

<a href="logout.php">
    <input type="button" name="" value="Разлогиниться">
</a>

<?php if (isset($_SESSION['admin'])) : ?>
    <?php if ($_SESSION['admin']) : ?>
        <a href="admin.php">
            <input type="button" value="вернуться к загрузке файлов">
        </a>
        <a href="del.php">
            <input type="button" value="Удалить все тесты">
        </a>
    <? else : exit;
        ?>
    <?php endif; ?>
<?php endif?>
</body>
</html>