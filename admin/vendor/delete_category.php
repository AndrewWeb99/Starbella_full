<?php 
session_start();
require_once '../../vendor/set.php';
if (isset($_GET['num'])) {
    $num = $_GET['num'];
    $mysqli->query("DELETE FROM `category` WHERE `category`.`id` = $num");
    header('Location: /admin/category.php');
}

