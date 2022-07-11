<?php
session_start();
require_once '../../vendor/set.php';

$name = $_POST['name'];
$f_desc = $_POST['f_desc'];
$s_desc = $_POST['s_desc'];

//Загрузка изображений
$uploaddir = '/images/blog/';
$filename = $_FILES['img']['name'];
$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);
$uploadfile = $uploaddir.uniqid('file_').$ext;
$dop = '../..';
move_uploaded_file($_FILES['img']['tmp_name'], $dop . $uploadfile);

// Запись в базу
$today = date("Y-m-d H:i:s");

$max_id = 0;

$mysqli->query("INSERT INTO `blog` (`id`, `name`, `img`, `f_desc`, `s_desc`, `date`, `comment_id`) VALUES (NULL, '$name', '$uploadfile', '$f_desc', '$s_desc', '$today', '$max_id')");

$max_idmain = $mysqli->query("SELECT MAX(`id`) FROM `blog`");
$nummain = mysqli_fetch_all($max_idmain);
foreach ($nummain as $nus) {
    $max_id = $nus[0];
}
$max_id;

$mysqli->query("UPDATE `blog` SET `comment_id` = '$max_id' WHERE `blog`.`id` = $max_id");

header('Location: /admin/blog.php');


