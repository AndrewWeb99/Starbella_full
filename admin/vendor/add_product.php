<?php
session_start();
require_once '../../vendor/set.php';

$name = $_POST['name'];
$price = $_POST['price'];
$skid = $_POST['skid'];
$short_description = $_POST['short_description'];
$full_description = $_POST['full_description'];
$total = $_POST['total'];
$number_tov = $_POST['number_tov'];
$category_id = $_POST['category_id'];

//Загрузка изображений
$uploaddir = '/images/product/product_small/';
$filename = $_FILES['img']['name'];
$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);
$uploadfile = $uploaddir.uniqid('file_').$ext;
$dop = '../..';
move_uploaded_file($_FILES['img']['tmp_name'], $dop . $uploadfile);

//Определение связи
$max_idmain = $mysqli->query("SELECT MAX(`id`) FROM `product`");
$max_id = 0;
$nummain = mysqli_fetch_all($max_idmain);
foreach ($nummain as $nus) {
    $max_id = $nus[0];
}
$max_id++;


// Запись в базу
$mysqli->query("INSERT INTO `product` (`id`, `name`, `price`, `skid`, `short_decsription`, `full_description`, `img`, `total`, `number_tov`, `category_id`, `tags`, `charct_id`, `otzv_id`) VALUES (NULL, '$name', $price, $skid, '$short_description', '$full_description', '$uploadfile', $total, $number_tov, $category_id, '$max_id', '$max_id', '$max_id')");

header('Location: /admin/tags.php?num=' . $max_id . '');


