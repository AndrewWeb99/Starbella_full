<?php
session_start();
require_once '../../vendor/set.php';


$name = $_POST['name'];
$id_cat = $_POST['id_cat'];
$img = $_POST['img'];
if ($_FILES['img_cat']['size'] != 0) {
    $uploaddir = '/images/categories/';
    $filename = $_FILES['img_cat']['name'];
    $ext = substr($filename, strpos($filename, '.'), strlen($filename) - 1);
    $uploadfile = $uploaddir . uniqid('file_') . $ext;
    $dop = '../..';
    unlink($dop . $img);
    move_uploaded_file($_FILES['img_cat']['tmp_name'], $dop . $uploadfile);
    $mysqli->query("UPDATE `category` SET `img` = '$uploadfile' WHERE `category`.`id` = $id_cat");
}

$mysqli->query("UPDATE `category` SET `name` = '$name' WHERE `category`.`id` = $id_cat");

header('Location: /admin/category.php');
