<?php
session_start();
require_once 'set.php';
if (isset($_GET['num'])) {
    $num = $_GET['num'];
}
$user = $_SESSION["user"]["id"];
$mysqli->query("DELETE FROM `basket` WHERE `basket`.`product_id` =" . $num);
$path = getallheaders()["Referer"];
header('Location: ' . $path);


