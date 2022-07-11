<?php
require_once '../vendor/set.php';
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
    <?php require('./blocks/header.php'); ?>
    <div class="container">
        <?php require('./blocks/nav.php'); ?>
        <!-- Добавление категорий -->
        <form action="/admin/vendor/add_product.php" method="post" enctype="multipart/form-data">
            <h1 class="title_main">Добавить товар</h1>
            <div class="facts_sections">
                <div class="facts_one_section">
                    <div class="field">
                        <label for="n">Название</label>
                        <input type="text" name="name" required />
                    </div>
                    <div class="field">
                        <label for="n">Цена</label>
                        <input type="text" name="price" required />
                    </div>
                    <div class="field">
                        <label for="n">Скидка(при наличии)</label>
                        <input type="text" name="skid" />
                    </div>
                    <div class="field">
                        <label for="n">Краткое описание</label>
                        <input type="text" name="short_description" required />
                    </div>
                    <div class="field">
                        <label for="n">Полное описание</label>
                        <input type="text" name="full_description" required />
                    </div>
                    <div class="field">
                        <label for="" id="">Изображение</label>
                        <input type="file" name="img" id="pct" required />
                        <p for="" id="pct_l"></p>
                    </div>
                    <div class="field">
                        <label for="n">Количество</label>
                        <input type="text" name="total" required />
                    </div>
                    <div class="field">
                        <label for="n">Номер товара</label>
                        <input type="text" name="number_tov" required />
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
                                    echo '<option value="' . $num[0] . '">' . $num[1] . '</option>';
                                }
                            } else {
                                echo 'Данные отсутсвуют!!!';
                            };
                            ?>
                        </select>
                    </div>
                    <!-- <div class="field">
                        <a class="button_table" href="" style="text-align: center;">Добавить теги</a>
                        <input type="text" name="name" style="visibility: hidden;" />
                    </div>
                    <div class="field">
                        <a class="button_table" href="#" style="text-align: center;">Добавить характеристики</a>
                        <input type="text" name="name" style="visibility: hidden;" />
                    </div> -->
                </div>
                <input type="submit" value="Добавить" style="margin-bottom: 20px; width: 50%; margin-top:20px;">
        </form>
        <!-- Удаление или изменение категорий -->
        <h1 class="title_main">Удалить или изменить товар</h1>
        <div class="facts_one_section">
            <table id="userTable" class="cell-border hover row-border" style="width:100%">
                <thead>
                    <tr>
                        <th>№ товара</th>
                        <th>Название</th>
                        <th>Изображение</th>
                        <th>Цена</th>
                        <th>Категория</th>
                        <th>Удалить</th>
                        <th>Изменить</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM product table1 JOIN category table2 ON table1.category_id=table2.id";
                    $cep  = $mysqli->query($sql);
                    if (mysqli_num_rows($cep) > 0) {
                        $cep = mysqli_fetch_all($cep);
                        $numb = 0;
                        foreach ($cep as $num) {
                            $numb++;
                            echo '
                                        <tr>
                                            <td>' . $numb . '</td>
                                            <td>' . $num[1] . '</td>
                                            <td><a class="button_table" href="' . $num[6] . '">Изображение</a></td>
                                            <td>' . $num[2] . '</td>
                                            <td>' . $num[14] . '</td>                          
                                            <td><a class="button_table" href="/admin/vendor/delete_product.php?num=' . $num[0] . '">Удалить</a></td> 
                                            <td><a class="button_table" href="/admin/vendor/update_product.php?num=' . $num[0] . '">Изменить</a></td>
                                        </tr>                              
                                            ';
                        }
                    } else {
                        echo 'Данные отсутсвуют!!!';
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