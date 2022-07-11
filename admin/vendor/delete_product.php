<?php
session_start();
require_once '../../vendor/set.php';
if (isset($_GET['num'])) {
    $num = $_GET['num'];
    $sql1 = "SELECT img, tags, charct_id, otzv_id FROM `product` WHERE id = $num";
    $img  = $mysqli->query($sql1);
    $img = mysqli_fetch_assoc($img);
    //Удаление изображения
    $dop = '../..';
    unlink($dop . $img['img']);


    $mysqli->query("DELETE FROM `tags` WHERE `tags`.`number_tag` = $num");
    $mysqli->query("DELETE FROM `characters` WHERE `characters`.`character_id` = $num");
    $mysqli->query("DELETE FROM `otziv` WHERE `otziv`.`product_id` = $num");
    $mysqli->query("DELETE FROM `product` WHERE `product`.`id` = $num");

    header('Location: /admin/product.php');
}
