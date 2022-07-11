<?
require_once '../vendor/set.php';
if (isset($_GET['num'])) {
    $num = $_GET['num'];
}
if (isset($_GET['user'])) {
    $user = $_GET['user'];
    $sql7 = "SELECT * FROM `users` WHERE `id` = " . $user;
    $cep7  = $mysqli->query($sql7);
    $cep7 = mysqli_fetch_assoc($cep7);
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
    <title>Детали заказа</title>
</head>

<body>
    <?php require('./blocks/header.php'); ?>
    <div class="container">
        <?php require('./blocks/nav.php'); ?>
        <!-- Добавление категорий -->
        <form action="/admin/vendor/mail.php" method="post" enctype="multipart/form-data">
            <h1 class="title_main">Отправить сообщение на почту</h1>
            <div class="facts_sections">
                <div class="facts_one_section">
                    <div class="field">
                        <label for="n">Email</label>
                        <input type="text" name="email" required value="<?= $cep7["email"] ?>" />
                    </div>
                    <div class="field">
                        <label for="n">Заголовок</label>
                        <textarea name="zag" id="" cols="10" rows="10"></textarea>
                    </div>
                    <div class="field">
                        <label for="n">Текст Сообщения</label>
                        <textarea name="text" id="" cols="10" rows="10"></textarea>
                    </div>
                </div>
                <input type="submit" value="Отправить" style="margin-bottom: 20px; width: 50%; margin-top:20px;">
        </form>
        <!-- Удаление или изменение категорий -->
        <h1 class="title_main">Список товаров</h1>
        <div class="facts_one_section">
            <table id="userTable" class="cell-border hover row-border" style="width:100%">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Название</th>
                        <th>Изображение</th>
                        <th>Количество</th>
                        <th>Цена</th>
                        <th>Стоимость</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $sql = "SELECT * FROM order_details WHERE `order_id` = " . $num;
                    $cep  = $mysqli->query($sql);
                    if (mysqli_num_rows($cep) > 0) {
                        $numb = 0;
                        $cep = mysqli_fetch_all($cep);
                        foreach ($cep as $nums) {
                            $numb++;
                            $nums[5] = (int)$nums[5];
                            $nums[6] = (int)$nums[6];
                            $cost = $nums[6] * $nums[5];
                            echo '
                                        <tr>
                                            <td>' . $numb . '</td>
                                            <td>' . $nums[3] . '</td>
                                            <td><img src="' . $nums[4]  . '" alt="" style="width: 100px; height:auto;"></td>                          
                                            <td>' . $nums[5]  . '</td>
                                            <td>' . $nums[6] . '</td>
                                            <td class="total_cost">' . $cost . '</td>
                                        </tr>                              
                                            ';
                        }
                    } else {
                        echo 'Данные отсутсвуют!!!';
                    };
                    ?>
                </tbody>
            </table>
            <p style="border: 2px solid blue; display: inline; padding: 10px;" class="totaler">Общая стоимость = </p>
        </div>

    </div>

    <script>
        let total = document.querySelectorAll('.total_cost');
        let totaler = document.querySelector('.totaler');
        let cost = 0;
        total.forEach(element => {
            cost += Number(element.innerHTML);
        });
        totaler.innerHTML += cost;
    </script>
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