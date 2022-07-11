<?php
session_start();
require_once '../../vendor/set.php';
if (isset($_GET['num'])) {
    $num = $_GET['num'];
    $tag = $_GET['tag'];
    $mysqli->query("DELETE FROM `tags` WHERE `tags`.`id` = $num");

    $max_idmain = $mysqli->query("SELECT MAX(id) FROM `product`");
    $nummain = mysqli_fetch_all($max_idmain);
    foreach ($nummain as $nus) {
        $max_id_dop = $nus[0];
    };
    $max_id_dop;
    if ($max_id_dop == $num) {
        header('Location: /admin/tags.php?num=' . $tag . '');
    } else {
        header('Location: /admin/vendor/update_product.php?num=' . $tag . '');
    }
}
