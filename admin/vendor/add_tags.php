<?php
session_start();
require_once '../../vendor/set.php';
$name = $_POST['name'];
$id = $_POST['num'];
$mysqli->query("INSERT INTO `tags` (`id`, `number_tag`, `name_tag`) VALUES (NULL, '$id', '$name')");

$max_idmain = $mysqli->query("SELECT MAX(id) FROM `product`");
    $nummain = mysqli_fetch_all($max_idmain);
    foreach ($nummain as $nus) {
        $max_id_dop = $nus[0];
    };
    $max_id_dop;
    if ($max_id_dop == $num) {
        header('Location: /admin/tags.php?num=' . $id . '');
    } else {
        header('Location: /admin/vendor/update_product.php?num=' . $id . '');
    }


