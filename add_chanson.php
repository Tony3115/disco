<?php
include('includes/header.php');
include('includes/pdo.php');

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
}

if (isset($_GET['idalbum'])) {
    $idalbum = ($_GET['idalbum']);
}


//recueillir les données postées par le formulaire
if (isset($_POST) && !empty($_POST)) {
    print_r($_POST);
    $idalbum = $_POST['idalbum'];
    $titre = $_POST['titre'];


    $artiste = $_POST['artiste'];
    $album = $_POST['album'];
    $result = addChanson($idalbum, $titre, $pdo);

    header("Location: detail.php?idalbum=$idalbum&artiste=$artiste&album=$album");
}

?>

<body>
    <?php
    include('includes/navbar.php');
    ?>

    <div class="container">
        <h1>Ajout d'une chanson pour : <?= $_GET['album'] ?></h1>
        <form action="add_chanson.php" method="post">
            <div class="form-group">
                <label for="exampleInputtitre">Titre de la chanson</label>
                <input type="text" class="form-control" name="titre" value="" required />
            </div>
            <input type="hidden" name="idalbum" value=" <?= $idalbum ?>">
            <input type="hidden" name="album" value=" <?= $_GET['album'] ?>">
            <input type="hidden" name="artiste" value=" <?= $_GET['artiste'] ?>">
            <button type="submit" class="btn btn-primary">Ajouter la chanson</button>
        </form>
    </div>