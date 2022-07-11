<?php
require_once '../../vendor/set.php';
if (isset($_GET['num'])) {
    $num = $_GET['num'];
    $target = $_GET['tag'];
    $sql1 = "SELECT * FROM `characters` WHERE id = $num";
    $ch  = $mysqli->query($sql1);
    $ch = mysqli_fetch_assoc($ch);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin/css/normalize.css">
    <link rel="stylesheet" href="/admin/css/main.css">
    <link rel="stylesheet" href="/admin/css/facts.css">
    <title>Управление характеристиками</title>
</head>

<body>
    <?php require('../blocks/header.php'); ?>
    <div class="container">
        <?php require('../blocks/nav.php'); ?>
        <!-- Добавление категорий -->
        <form action="/admin/vendor/vendor_update_characters.php" method="post">
            <h1 class="title_main">Изменить характеристику</h1>
            <div class="facts_sections">
                <div class="facts_one_section">
                    <div class="field" style="display: none;">
                        <label for="n">Номер тэга</label>
                        <input type="text" name="num" value="<?= $ch['id'] ?>" />
                    </div>
                    <div class="field" style="display: none;">
                        <label for="n">Номер товара</label>
                        <input type="text" name="tov" value="<?=  $target ?>" />
                    </div>
                    <div class="field">
                        <label for="n">Название характеристики</label>
                        <input type="text" name="name" required value="<?= $ch['name']  ?>"/>
                    </div>
                    <div class="field">
                        <label for="n">Описание</label>
                        <input type="text" name="description" required value="<?= $ch['description']  ?>"/>
                    </div>
                </div>
                <input type="submit" value="Изменить" style="margin-bottom: 20px; width: 50%; margin-top:20px;">
        </form>
    </div>

</body>

</html>