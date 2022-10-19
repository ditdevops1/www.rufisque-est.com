<?php
$db_user = "root";
$db_pass = "";
$db_name = "rufisque_est";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);

$id=$_GET['id'];
$db->exec("DELETE FROM nouveau_ne WHERE num_extrait = $id");
header('Location:index.html');
?>