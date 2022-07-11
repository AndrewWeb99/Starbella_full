<?php
session_start();
require_once '../../vendor/set.php';

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$skid = $_POST['skid'];
$short_decsription = $_POST['short_decsription'];
$full_description = $_POST['full_description'];
$total = $_POST['total'];
$number_tov = $_POST['number_tov'];
$category_id = $_POST['category_id'];

$img_old = $_POST['img_old'];
if ($_FILES['img']['size'] != 0) {
    $uploaddir = '/images/product/product_small/';
    $filename = $_FILES['img']['name'];
    $ext = substr($filename, strpos($filename, '.'), strlen($filename) - 1);
    $uploadfile = $uploaddir . uniqid('file_') . $ext;
    $dop = '../..';
    unlink($dop . $img_old);
    move_uploaded_file($_FILES['img']['tmp_name'], $dop . $uploadfile);
    $mysqli->query("UPDATE `product` SET `img` = '$uploadfile'  WHERE `product`.`id` = $id");
}

// Запись в базу
$mysqli->query("UPDATE `product` SET `name` = '$name', `price` = '$price', `skid` = '$skid', `short_decsription` = '$short_decsription', `full_description` = '$full_description', `total` = '$total', `number_tov` = '$number_tov', `category_id` = '$category_id'  WHERE `product`.`id` = $id");

header('Location: /admin/vendor/update_product.php?num=' . $id . '');
