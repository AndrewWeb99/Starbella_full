<?php
session_start();
require_once 'set.php';
if (isset($_GET['num'])) {
    $nums = $_GET['num'];
}
$user = $_SESSION["user"]["id"];
$mysqli->query("INSERT INTO `orders` (`id`, `user_id`, `total_cost`) VALUES (NULL, '$user', '$nums')");

$sql2 = "SELECT MAX(id) FROM `orders`";
$cep2  = $mysqli->query($sql2);
$cep2 = mysqli_fetch_assoc($cep2);
$max = $cep2['MAX(id)'];



$sql = "SELECT product_id ,COUNT(product_id) FROM basket WHERE `user_id` = " . $_SESSION["user"]["id"] . " GROUP BY product_id";
$cep  = $mysqli->query($sql);
if (mysqli_num_rows($cep) > 0) {
    $cep = mysqli_fetch_all($cep);
    foreach ($cep as $num) {
        $product = $num[0];
        $sql2 = "SELECT * FROM `product` WHERE `id` = " . $product;
        $cep2  = $mysqli->query($sql2);
        $cep2 = mysqli_fetch_assoc($cep2);
        $main_sql = "INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `name`, `img`, `total`, `price`) VALUES (NULL, '$max', '" . $cep2['id'] . "', '" . $cep2['name'] . "', '" . $cep2['img']  . "', '" . $num[1] . "', '" . $cep2['price']  . "')";
        $mysqli->query($main_sql);
        header('Location: /pages/cabinet.php');
    }
} else {
    echo 'Данные отсутсвуют!!!';
};



