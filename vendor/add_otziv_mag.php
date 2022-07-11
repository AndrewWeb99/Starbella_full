<?php
require_once 'set.php';

$name = $_POST['name'];
$email = $_POST['email'];
$theme = $_POST['theme'];
$message = $_POST['message'];

// Запись в базу
$mysqli->query("INSERT INTO `otziv_mag` (`id`, `name`, `email`, `theme`, `message`) VALUES (NULL, '$name', '$email', '$theme', '$message')");

header('Location: /pages/about.php?yes=yes');