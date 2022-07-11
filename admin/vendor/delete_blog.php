<?php
session_start();
require_once '../../vendor/set.php';
if (isset($_GET['num'])) {
    $num = $_GET['num'];
    $sql1 = "SELECT img, comment_id FROM `blog` WHERE id = $num";
    $img  = $mysqli->query($sql1);
    $img = mysqli_fetch_assoc($img);
    //Удаление изображения
    $dop = '../..';
    unlink($dop . $img['img']);

    $mysqli->query("DELETE FROM `blog` WHERE `blog`.`id` = $num");
    $mysqli->query("DELETE FROM `comment_blog` WHERE `comment_blog`.`blog_state_id` = $num");
 
    header('Location: /admin/blog.php');
}
