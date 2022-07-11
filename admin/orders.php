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
    <title>Заказы</title>
</head>

<body>
    <?php require('./blocks/header.php'); ?>
    <div class="container">
        <?php require('./blocks/nav.php'); ?>      
        <div class="facts_one_section">
        <h1 class="title_main">Заказы</h1>
            <table id="userTable" class="cell-border hover row-border" style="width:100%">
                <thead>
                    <tr>
                        <th>Номер</th>
                        <th>Идентификатор</th>
                        <th>Сумма</th>
                        <th>Детали</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `orders`";
                    $cep  = $mysqli->query($sql);
                    if (mysqli_num_rows($cep) > 0) {
                        $cep = mysqli_fetch_all($cep); 
                        $numb = 0;
                        foreach ($cep as $number) {
                            $numb++;
                            echo '
                                        <tr>
                                            <td>' . $number[0] . '</td>    
                                            <td>' . $number[1] . '</td>   
                                            <td>' . $number[2] . '</td>    
                                            <td><a class="button_table" href="/admin/order_details.php?num=' . $number[0] . '&user=' . $number[1] . '">Открыть</a></td>                     
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