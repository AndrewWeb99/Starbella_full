<?php
session_start();
require_once '../../vendor/set.php';

$num = $_POST['num'];
$tov = $_POST['tov'];
$name = $_POST['name'];

$mysqli->query("UPDATE `tags` SET `name_tag` = '$name' WHERE `tags`.`id` = $num");


$max_idmain = $mysqli->query("SELECT MAX(id) FROM `product`");
    $nummain = mysqli_fetch_all($max_idmain);
    foreach ($nummain as $nus) {
        $max_id_dop = $nus[0];
    };
    $max_id_dop;
    if ($max_id_dop == $num) {
        header('Location: /admin/tags.php?num=' . $tov . '');
    } else {
        header('Location: /admin/vendor/update_product.php?num=' . $tov . '');
    }

