<?php
session_start(); 
require_once 'set.php';

$login = $_POST['login']; 
$password = $_POST['password'];

if ($login === '' || $password === '') {
    $_SESSION['is_error'] = true;
    $_SESSION['error_message'] = 'Ошибка входа. Проверьте данные!';
    header('Location: /pages/login.php');
}

$user = $mysqli->query("SELECT * FROM `users` WHERE `login` = '$login'");
$user = $user->fetch_array();

if (!$user) {
    $_SESSION['is_error'] = true;
    $_SESSION['error_message'] = 'Ошибка входа. Проверьте данные!';
    header('Location: /pages/login.php');
}
if (password_verify($password, $user["password"]) === true and $user['type'] == 'Администратор') {
    $_SESSION["auth"] = true;
    $_SESSION["user"] = [
        "id" => $user["id"],
        "login" => $user["login"],
        "name" => $user["name"],
        "type" => $user["type"]
    ];
    header('Location: /admin/index_adm.php');
} else if (password_verify($password, $user["password"]) === true) {
    $_SESSION["auth"] = true;
    $_SESSION["user"] = [
        "id" => $user["id"],
        "login" => $user["login"],
        "name" => $user["name"],
        "type" => $user["type"]
    ];
    header('Location: /pages/cabinet.php');
} else {
    $_SESSION['is_error'] = true;
    $_SESSION['error_message'] = 'Ошибка входа. Проверьте данные!';
    header('Location: /pages/login.php');
}
