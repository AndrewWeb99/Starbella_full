<?php
session_start();
require_once '../../vendor/set.php';

$name = $_POST['name'];
//Загрузка изображений
$uploaddir = '/images/categories/';
$filename = $_FILES['img_cat']['name'];
$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);
$uploadfile = $uploaddir.uniqid('file_').$ext;
$dop = '../..';
move_uploaded_file($_FILES['img_cat']['tmp_name'], $dop . $uploadfile);
// Запись в базу
$mysqli->query("INSERT INTO `category` (`id`, `name`, `img`) VALUES (NULL, '$name', '$uploadfile')");

header('Location: /admin/category.php');


