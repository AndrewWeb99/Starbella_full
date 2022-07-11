<?php
require_once '../../vendor/set.php';

if (isset($_GET['num'])) {
    $tov = $_GET['num'];
    $sql3 = "SELECT * FROM `product` WHERE id = $tov";
    $pr  = $mysqli->query($sql3);
    $pr = mysqli_fetch_assoc($pr);
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
    <link rel="stylesheet" href="/admin/form_styler/jquery.formstyler.css">
    <link rel="stylesheet" href="/admin/form_styler/jquery.formstyler.theme.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <title>Управление товарами</title>
</head>

<body>
    <style>
        #pct_l {
            display: none;
            width: auto;
            height: 12em;
            background-size: contain;
            background-repeat: no-repeat;
        }
    </style>
    <?php require('../blocks/header.php'); ?>
    <div class="container">
        <?php require('../blocks/nav.php'); ?>
        <!-- Добавление категорий -->
        <form action="/admin/vendor/vendor_update_product.php" method="post" enctype="multipart/form-data">
            <h1 class="title_main">Изменить товар</h1>
            <div class="facts_sections">
                <div class="facts_one_section">
                <div class="field" style="display: none;">
                        <label for="n">id</label>
                        <input type="text" name="id" required value="<?= $pr['id'] ?>" />
                    </div>
                    <div class="field">
                        <label for="n">Название</label>
                        <input type="text" name="name" required value="<?= $pr['name'] ?>" />
                    </div>
                    <div class="field">
                        <label for="n">Цена</label>
                        <input type="text" name="price" required value="<?= $pr['price'] ?>" />
                    </div>
                    <div class="field">
                        <label for="n">Скидка(при наличии)</label>
                        <input type="text" name="skid" value="<?= $pr['skid'] ?>" />
                    </div>
                    <div class="field">
                        <label for="n">Краткое описание</label>
                        <input type="text" name="short_decsription" required value="<?= $pr['short_decsription'] ?>" />
                    </div>
                    <div class="field">
                        <label for="n">Полное описание</label>
                        <input type="text" name="full_description" required value="<?= $pr['full_description'] ?>" />
                    </div>
                    <div class="field" style="display: none;">
                        <label for="n">img</label>
                        <input type="text" name="img_old" required value="<?= $pr['img']  ?>" />
                    </div>
                    <div class="field">
                        <label for="" id="">Изображение</label>
                        <a style="text-align: center; width: 50%; position:relative; float: left; display:inline; margin-bottom: 5px;" class="button_table" href="<?= $pr['img'] ?>">Изображение</a>
                        <input type="file" name="img" id="pct" />
                        <p for="" id="pct_l"></p>
                    </div>
                    <div class="field">
                        <label for="n">Количество</label>
                        <input type="text" name="total" required value="<?= $pr['total'] ?>" />
                    </div>
                    <div class="field">
                        <label for="n">Номер товара</label>
                        <input type="text" name="number_tov" required value="<?= $pr['number_tov'] ?>" />
                    </div>
                    <div class="field">
                        <label for="ln">Категория</label>
                        <select name="category_id" id="category_id" required>
                            <?php

                            $sql = "SELECT * FROM `category`";
                            $cep  = $mysqli->query($sql);
                            if (mysqli_num_rows($cep) > 0) {
                                $cep = mysqli_fetch_all($cep);
                                $numb = 0;
                                foreach ($cep as $num) {
                                    $numb++;
                                    if ($num[0] ==  $pr['category_id']){
                                        echo '<option selected value="' . $num[0] . '">' . $num[1] . '</option>';
                                    }else{
                                        echo '<option value="' . $num[0] . '">' . $num[1] . '</option>';
                                    }
                                }
                            } else {
                                echo 'Данные отсутсвуют!!!';
                            };
                            ?>
                        </select>
                    </div>
                </div>
                <input type="submit" value="Изменить" style="margin-bottom: 20px; width: 50%; margin-top:20px;">
        </form>
        <!-- Удаление или изменение категорий -->
        <h1 class="title_main">Удалить или изменить тэги</h1>
        <div class="facts_one_section">
            <table id="userTable" class="cell-border hover row-border" style="width:100%">
                <thead>
                    <tr>
                        <th>Название тега</th>
                        <th>Удалить</th>
                        <th><a class="button_table" href="/admin/tags.php?num=<?= $tov ?>">Изменить</a></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql1 = "SELECT * FROM `tags` WHERE number_tag=" . $tov;
                    $cep1  = $mysqli->query($sql1);
                    if (mysqli_num_rows($cep1) > 0) {
                        $cep1 = mysqli_fetch_all($cep1);
                        $numbe = 0;
                        foreach ($cep1 as $number) {
                            $numbe++;
                            echo '
                                        <tr>
                                            <td>' . $number[2] . '</td>                        
                                            <td><a class="button_table" href="/admin/vendor/delete_tags.php?num=' . $number[0] . '&tag=' . $tov . '">Удалить</a></td>
                                            <td>Добавление/Изменение</td>
                                        </tr>                              
                                            ';
                        }
                    };
                    ?>
                </tbody>
            </table>
        </div>


        <h1 class="title_main">Удалить или изменить характеристики</h1>
        <div class="facts_one_section">
            <table id="userTable2" class="cell-border hover row-border" style="width:100%">
                <thead>
                    <tr>
                        <th>Название характеристики</th>
                        <th>Описание</th>
                        <th>Удалить</th>
                        <th><a class="button_table" href="/admin/characters.php?num=<?= $tov ?>">Изменение</a></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql2 = "SELECT * FROM `characters` WHERE character_id=" . $tov;
                    $cep2  = $mysqli->query($sql2);
                    if (mysqli_num_rows($cep2) > 0) {
                        $cep2 = mysqli_fetch_all($cep2);
                        $numbers = 0;
                        foreach ($cep2 as $number) {
                            $numbers++;
                            echo '
                                        <tr>
                                            <td>' . $number[2] . '</td>    
                                            <td>' . $number[3] . '</td>                       
                                            <td><a class="button_table" href="/admin/vendor/delete_characters.php?num=' . $number[0] . '&tag=' . $tov . '">Удалить</a></td>
                                            <td>Добавление/Изменение</td>
                                        </tr>                              
                                            ';
                        }
                    };
                    ?>
                </tbody>
            </table>
        </div>

    </div>


    <script>
        document.querySelector("#pct").addEventListener("change", function() {
            if (this.files[0]) {
                var fr = new FileReader();

                fr.addEventListener("load", function() {
                    document.querySelector("#pct_l").style.display = 'block';
                    document.querySelector("#pct_l").style.backgroundImage = "url(" + fr.result + ")";
                }, false);

                fr.readAsDataURL(this.files[0]);
            }
        });
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/admin/form_styler/jquery.formstyler.js"></script>
    <script src="/admin/form_styler/styler.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/js/table.js"></script>
</body>

</html>