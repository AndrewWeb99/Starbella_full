<?php
session_start();
require_once '../../vendor/set.php';
$name = $_POST['name'];
$description = $_POST['description'];
$id = $_POST['num'];
$mysqli->query("INSERT INTO `characters` (`id`, `character_id`, `name`, `description`) VALUES (NULL, '$id', '$name', '$description')");

$max_idmain = $mysqli->query("SELECT MAX(id) FROM `product`");
$nummain = mysqli_fetch_all($max_idmain);
foreach ($nummain as $nus) {
    $max_id_dop = $nus[0];
};
$max_id_dop;
if ($max_id_dop == $num) {
    header('Location: /admin/characters.php?num=' . $id . '');
} else {
    header('Location: /admin/vendor/update_product.php?num=' . $id . '');
}
