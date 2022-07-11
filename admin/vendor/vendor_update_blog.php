<?php
session_start();
require_once '../../vendor/set.php';

$id = $_POST['id'];
$img_old = $_POST['img_old'];

$name = $_POST['name'];
$f_desc = $_POST['f_desc'];
$s_desc = $_POST['s_desc'];
$today = date("Y-m-d H:i:s");

if ($_FILES['img']['size'] != 0) {
    $uploaddir = '/images/blog/';
    $filename = $_FILES['img']['name'];
    $ext = substr($filename, strpos($filename, '.'), strlen($filename) - 1);
    $uploadfile = $uploaddir . uniqid('file_') . $ext;
    $dop = '../..';
    unlink($dop . $img_old);
    move_uploaded_file($_FILES['img']['tmp_name'], $dop . $uploadfile);
    $mysqli->query("UPDATE `blog` SET `img` = '$uploadfile' WHERE `blog`.`id` = $id");
}

$mysqli->query("UPDATE `blog` SET `name` = '$name', `f_desc` = '$f_desc', `s_desc` = '$s_desc', `date` = '$today' WHERE `blog`.`id` = $id");

header('Location: /admin/vendor/update_blog.php?num=' . $id);
