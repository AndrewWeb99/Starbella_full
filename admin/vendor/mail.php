<?php
session_start();
require_once '../../vendor/set.php';
$email = $_POST['email'];
$zag = $_POST['zag'];
$text = $_POST['text'];
if ($email != '' and $zag != '' and $text != '') {
    $to = $email;
    $subject = $zag;
    $msg = "Менеджер Starbella \n";
    $msg .= $text . "\n";
    mail($to, $subject, $msg);
}
$path = getallheaders()["Referer"];
header('Location: ' . $path);
