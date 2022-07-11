<?php
require_once 'set.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$theme = $_POST['theme'];
$message = $_POST['message'];
$today = date("Y-m-d H:i:s");
// Запись в базу
$mysqli->query("INSERT INTO `comment_blog` (`id`, `blog_state_id`, `name`, `email`, `theme`, `message`, `date`) VALUES (NULL, '$id', '$name', '$email', '$theme', '$message', '$today')");

header('Location: /pages/blog_one.php?num='.$id);