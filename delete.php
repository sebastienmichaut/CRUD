<?php

include "./database.php";
$db = Database::connect();

$db->query("DELETE FROM `list` WHERE `list`.id={$_GET['id']}");

header('location:./index.php');

Database::disconnect();

?>
