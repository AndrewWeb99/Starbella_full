<?php
require_once 'set.php';

$email = $_POST['email'];
$login = $_POST['login'];
$password = $_POST['password'];

if ($login === '' || $name === '' || $password === '' || $role === '') {
    $_SESSION['is_error'] = true;
    $_SESSION['error_message'] = 'Проверьте правильность введенных полей!!!';
    header('Location: /pages/registr.php');
}

$pass_block = password_hash($password, PASSWORD_DEFAULT);
// Запись в базу
$mysqli->query("INSERT INTO `users` (`id`, `email`, `login`, `password`, `type`) VALUES (NULL, '$email', '$login', '$pass_block', 'Покупатель')");

header('Location: /pages/login.php');
