<?php
include('includes/header.php');
include('includes/pdo.php');

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
}

//recueillir les données postées par le formulaire
if (isset($_POST) && !empty($_POST)) {

    /*echo "<pre>";
    print_r($_POST);
    echo "</pre>";*/

    $album = $_POST['album'];
    $artiste = $_POST['artiste'];
    $genre = $_POST['genre'];

    $result = addAlbum($album, $artiste, $genre, $pdo);

    header("Location: liste.php");
}


$genre = getGenre($pdo);

?>

<body>
    <?php
    include('includes/navbar.php');
    ?>

    <div class="container">
        <h1>Ajout d'un album </h1>
        <form action="add_album.php" method="post">
            <div class="form-group">
                <label for="exampleInputtitre">Album</label>
                <input type="text" class="form-control" name="album" value="" required />
            </div>
            <div class="form-group">
                <label for="exampleInputtitre">Artiste</label>
                <input type="text" class="form-control" name="artiste" value="" required />
            </div>
            <div class="form-group">
                <label for="exampleInputtitre">Genre</label>
                <select class="form-control" name="genre">
                    <?php
                    for ($i = 0; $i < count($genre); $i++) {
                    ?>

                        <option value="<?= $genre[$i]['id'] ?>"><?= $genre[$i]['genre'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>