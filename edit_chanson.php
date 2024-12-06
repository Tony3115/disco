<?php
include('includes/header.php');
include('includes/function-pdo.php');

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
}

//recueillir l'idalbum via $_GET (barre d'adresse)
if (isset($_GET['idchanson'])) {
    $idchanson =  $_GET['idchanson'];
    $artiste =  $_GET['artiste'];
    $album =  $_GET['album'];
    $idalbum =  $_GET['idalbum'];


    $result = getChanson($idchanson, $pdo);
}


//recueillir les données postées par le formulaire
if (isset($_POST) && !empty($_POST)) {


    $idchanson = $_POST['idchanson'];
    $titre = $_POST['titre'];
    $artiste = $_POST['artiste'];
    $album = $_POST['album'];
    $idalbum = $_POST['idalbum'];


    $result = editChanson($idchanson, $titre, $pdo);

    header("Location: detail.php?idalbum=$idalbum&artiste=$artiste&album=$album");
}


?>

<body>
    <?php
    include('includes/navbar.php');
    ?>

    <div class="container">
        <h1>Edition d'une chanson </h1>

        <form action="edit_chanson.php" method="post">
            <div class="form-group">
                <label for="exampleInputtitre">titre</label>
                <input type="text" class="form-control" name="titre" value="<?= $result['titre'] ?>" />
            </div>
            <input type="hidden" name="idchanson" value=" <?= $idchanson ?>">
            <input type="hidden" name="artiste" value=" <?= $artiste ?>">
            <input type="hidden" name="album" value=" <?= $album ?>">
            <input type="hidden" name="idalbum" value=" <?= $idalbum ?>">
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</body>