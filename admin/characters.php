<?php
require_once '../vendor/set.php';
$num = $_GET['num'];
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
    <link rel="stylesheet" href="/admin/form_styler/jquery.formstyler.css">
    <link rel="stylesheet" href="/admin/form_styler/jquery.formstyler.theme.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <title>Управление характеристиками</title>
</head>

<body>
    <?php require('./blocks/header.php'); ?>
    <div class="container">
        <?php require('./blocks/nav.php'); ?>
        <!-- Добавление категорий -->
        <form action="/admin/vendor/add_characters.php" method="post">
            <h1 class="title_main">Добавить характеристику</h1>
            <div class="facts_sections">
                <div class="facts_one_section">
                    <div class="field" style="display: none;">
                        <label for="n">Номер записи</label>
                        <input type="text" name="num" value="<?= $num ?>" />
                    </div>
                    <div class="field">
                        <label for="n">Название характеристики</label>
                        <input type="text" name="name" required />
                    </div>
                    <div class="field">
                        <label for="n">Описание</label>
                        <input type="text" name="description" required />
                    </div>
                </div>
                <input type="submit" value="Добавить" style="margin-bottom: 20px; width: 50%; margin-top:20px;">
        </form>
        <!-- Удаление или изменение категорий -->
        <h1 class="title_main">Удалить или изменить характеристики</h1>
        <div class="facts_one_section">
            <table id="userTable" class="cell-border hover row-border" style="width:100%">
                <thead>
                    <tr>
                        <th>Название характеристики</th>
                        <th>Описание</th>
                        <th>Удалить</th>
                        <th>Изменить</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `characters` WHERE character_id=".$num;
                    $cep  = $mysqli->query($sql);
                    if (mysqli_num_rows($cep) > 0) {
                        $cep = mysqli_fetch_all($cep);
                        $numb = 0;
                        foreach ($cep as $number) {
                            $numb++;
                            echo '
                                        <tr>
                                            <td>' . $number[2] . '</td>    
                                            <td>' . $number[3] . '</td>                       
                                            <td><a class="button_table" href="/admin/vendor/delete_characters.php?num=' . $number[0] . '&tag=' . $num . '">Удалить</a></td>
                                            <td><a class="button_table" href="/admin/vendor/update_characters.php?num=' . $number[0] . '&tag=' . $num . '">Изменить</a></td>
                                        </tr>                              
                                            ';
                        }
                    };
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/js/table.js"></script>
</body>

</html>