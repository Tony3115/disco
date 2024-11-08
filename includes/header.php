<?php
session_start();
$dsn = 'mysql:host=localhost;dbname=disco';
$user = 'root';
$pass = '';
// Création de l'objet de connexion qui va nous permettre de faire des requêtes SQL
$pdo = new \PDO($dsn, $user, $pass);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Album</title>
</head>