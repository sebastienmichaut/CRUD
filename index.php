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
?>
<div class="container">
    <div class="row justify-content-center ">
        <div>
            <h1 class="text-center">TODOAPP</h1>
            <p class="text-center">N'oublies plus ce que tu as à faire !</p>
            <a href="./create.php" class="btn btn-grad1 mt-5">Créer une liste</a>
        </div>
    </div>
    <div class="row justify-content-around">
<?php
    foreach ($db->query("SELECT * FROM `list`") as $liste) {
?>
        <div class="card col-sm-5 my-5 mx-1">
            <div class="card-body">
                <div class="row"  style="<?php echo"background-color: {$liste['color']};"?>">
                    <h5 class="card-title px-1"><b><?php echo $liste['name']?></b></h5>
                    <a href="./create_tasks.php?id=<?= $liste['id'] ?>" class="btn btn-primary"><i class="far fa-plus-square"></i></a>
                </div>
            </div>
            <div class="container">
                <div class="row d-inline-flex">
                    <ol>
<?php
    foreach ($db->query("SELECT * FROM `taches` WHERE list_id={$liste['id']}") as $tache){
?>
                        <li>
                            <div class="row mx-1">
                                <span class="mx-1"><?= $tache['title'] ?></span>
                                <div class="mx-1">
                                    <input type="checkbox">
                                </div>
                                <div class="mx-1">
                                    <a href="./update-tasks.php?id=<?=$tache['id'] ?>"><i class="fas fa-edit"></i></a>
                                </div>                          
                                <div class="mx-1">
                                    <a href=""><i class="fas fa-trash-alt text-danger"></i></a>
                                </div>
                            </div>
                        </li>
<?php
    }
?>
                    </ol>
                </div>
            </div>
            <div class="row card-body justify-content-around">
                <a class="btn btn-grad2 px-2 col-xs-6 col-sm-5" href="./update.php?id=<?php echo $liste['id'] ?>" role="button"><i class="fas fa-edit px-1"></i>Modifier</a>
                <a class="btn btn-grad3 px-2 col-xs-6 col-sm-5" href="./delete.php?id=<?php echo $liste['id'] ?>" role="button"><i class="fas fa-trash-alt px-1"></i>Supprimer</a>
            </div>
        </div>
    

    <?php }
    Database::disconnect();
?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>