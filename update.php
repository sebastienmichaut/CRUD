<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<?php
    include "./database.php";
    $db = Database::connect();
    $req = $db->query("SELECT * FROM `list` WHERE id={$_GET['id']}");
    $liste = $req->fetch();

if ($_POST) {
    $name = $_POST['name'];
    $color = $_POST['color'];
    $sql = "UPDATE `list` SET name='{$_POST['name']}', color='{$_POST['color']}' WHERE id={$_GET['id']}";
    $db->query($sql);
    header('location:./index.php');

}

    Database::disconnect();
?>

<div class="container">
    <div class="row justify-content-center ">
        <div>
            <a href="./index.php" class="btn btn-grad1 mt-5"><i class="fas fa-home mr-2"></i>Revenir à la page d'accueil</a>
            <h1 class="text-center">Modifier une liste</h1>
        </div>
    </div>
    <div class="row justify-content-center ">
        <div class="card mt-5" style="width: 18rem;">
            <div class="card-body">
                <form method="post">
                    <h5 class="card-title">Nom</h5>
                    <input type="text" name="name" value="<?= $liste['name'] ?>"> 
                    <h5 class="card-title mt-3">Couleur de la liste</h5>
                    <input type="color" name="color" value="<?= $liste['color'] ?>">
                    <input class="btn btn-grad2 px-2" type="submit" Value="Modifier la liste">
                </form>
            </div>
        </div>
    </div>
</div>










<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>