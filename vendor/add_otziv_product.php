<?php
require_once 'set.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$today = date("Y-m-d H:i:s");

$rating = 0;
$rating5 = $_POST['rating5'];
$rating4 = $_POST['rating4'];
$rating3 = $_POST['rating3'];
$rating2 = $_POST['rating2'];
$rating1 = $_POST['rating1'];

if ($rating1 == 1) {
    $rating = 1;
}
if ($rating2 == 2) {
    $rating = 2;
}
if ($rating3 == 3) {
    $rating = 3;
}
if ($rating4 == 4) {
    $rating = 4;
}
if ($rating5 == 5) {
    $rating = 5;
}

// Запись в базу
$mysqli->query("INSERT INTO `otziv` (`id`, `product_id`, `name`, `email`, `desciption`, `stars`, `date`) VALUES (NULL, '$id', '$name', '$email', '$message', '$rating', '$today')");

header('Location: /pages/product.php?num=' . $id);
