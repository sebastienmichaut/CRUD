<?php

include "./database.php";
$db = Database::connect();

$db->query("DELETE FROM `taches` WHERE id={$_GET['id']}");

header('location:./index.php');

Database::disconnect();

?>