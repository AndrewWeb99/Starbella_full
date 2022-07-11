<?php
session_start();
require_once 'set.php';
if (isset($_GET['num'])) {
    $num = $_GET['num'];
}
$user = $_SESSION["user"]["id"];

if (isset($_GET['total'])) {
    if ($_SESSION["user"]["id"] == "") {
        header('Location: /pages/login.php');
    } else {
        $tot = $_GET['total'];
        $tot = (int)$tot;
        for ($i = 0; $i < $tot; $i++) {
            $mysqli->query("INSERT INTO `basket` (`id`, `user_id`, `product_id`) VALUES (NULL, '$user', '$num')");
        }
        $path = getallheaders()["Referer"];
        header('Location: ' . $path);
    }
} else {
    if ($_SESSION["user"]["id"] == "") {
        header('Location: /pages/login.php');
    } else {
        $mysqli->query("INSERT INTO `basket` (`id`, `user_id`, `product_id`) VALUES (NULL, '$user', '$num')");
        $path = getallheaders()["Referer"];
        header('Location: ' . $path);
    }
}
