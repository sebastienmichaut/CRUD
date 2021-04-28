<?php

include "./database.php";
$db = Database::connect();
$tache_id = $_GET['id'];
$req =$db->query("SELECT * FROM `taches` WHERE id= {$tache_id}");
$tache = $req->fetch();


$completed = !$tache['completed'];
$sql = "UPDATE `taches` SET completed = $completed WHERE id={$tache_id}";
// var_dump($sql);
$db->query($sql);

header('location:./index.php');



Database::disconnect();

?>