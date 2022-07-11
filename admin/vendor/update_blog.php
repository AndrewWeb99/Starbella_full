<?php
session_start();
require_once '../../vendor/set.php';
if (isset($_GET['num'])) {
    $num = $_GET['num'];
    $sql1 = "SELECT * FROM `blog` WHERE id = $num";
    $bl  = $mysqli->query($sql1);
    $bl = mysqli_fetch_assoc($bl);
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
    <title>Управление статьями</title>
</head>

<body>
    <style>
        #pct_l {
            display: block;
            width: auto;
            height: 12em;
            background-size: contain;
            background-repeat: no-repeat;
            background-image: url('<?= $bl['img'] ?>');
        }
    </style>
    <?php require('../blocks/header.php'); ?>
    <div class="container">
        <?php require('../blocks/nav.php'); ?>
        <!-- Добавление категорий -->
        <form action="/admin/vendor/vendor_update_blog.php" method="post" enctype="multipart/form-data">
            <h1 class="title_main">Изменить статью</h1>
            <div class="facts_sections">
                <div class="facts_one_section">
                    <div class="field" style="display: none;">
                        <label for="n">id</label>
                        <input type="text" name="id" required value="<?= $bl['id'] ?>" />
                    </div>
                    <div class="field" style="display: none;">
                        <label for="n">img</label>
                        <input type="text" name="img_old" required value="<?= $bl['img'] ?>" />
                    </div>
                    <div class="field">
                        <label for="n">Название</label>
                        <input type="text" name="name" required value="<?= $bl['name'] ?>" />
                    </div>
                    <div class="field">
                        <label for="" id="">Изображение</label>
                        <input type="file" name="img" id="pct" />
                        <p for="" id="pct_l"></p>
                    </div>
                    <div class="field">
                        <label for="n">Полное описание</label>
                        <textarea name="f_desc" id="" cols="10" rows="10"><?= $bl['f_desc'] ?></textarea>
                    </div>
                    <div class="field">
                        <label for="n">Краткое описание</label>
                        <textarea name="s_desc" id="" cols="10" rows="10"><?= $bl['s_desc'] ?></textarea>
                    </div>
                </div>
                <input type="submit" value="Изменить" style="margin-bottom: 20px; width: 50%; margin-top:20px;">
        </form>

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