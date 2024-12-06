<?php
include('includes/header.php');
include('includes/pdo.php');

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
}

//recueillir l'idalbum via $_GET (barre d'adresse)
if (isset($_GET['idalbum'])) {

    $idalbum =  $_GET['idalbum'];

    $result = effacerAlbum($idalbum, $pdo);
    header("Location: liste.php");
}
