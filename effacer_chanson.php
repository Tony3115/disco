<?php
include('includes/header.php');
include('includes/pdo.php');

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
}

//recueillir l'idalbum via $_GET (barre d'adresse)
if (isset($_GET['idchanson'])) {
    $idchanson =  $_GET['idchanson'];
    $artiste =  $_GET['artiste'];
    $album =  $_GET['album'];
    $idalbum =  $_GET['idalbum'];


    $result = effacerChanson($idchanson, $pdo);
    header("Location: detail.php?idalbum=$idalbum&artiste=$artiste&album=$album");
}
