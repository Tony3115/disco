<?php
include('includes/header.php');
include('includes/pdo.php');


function getGenres($pdo)
{
    $sql = "SELECT id, genre FROM genres";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$genres = getGenres($pdo);

function pretty($genres)
{
    echo "<pre>";
    print_r($genres);
    echo "</pre>";
}

pretty($genres);



if (!isset($_SESSION['email'])) {
    header('Location: login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $album = $_POST["album"];
    $artiste = $_POST["artiste"];
    $genre = intval($_POST["genre"]);


    $sql = "INSERT INTO albums (album, artiste, genre) VALUES (:album,:artiste,:genre)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':album', $album);
    $stmt->bindParam(':artiste', $artiste);
    $stmt->bindParam('genre', $genre);
    $stmt->execute();

    echo '<p>album ajouté avec succès</p>';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exercice21</title>
</head>

<body>
    <h1>Ajouter un disque</h1>
    <form action="exercice21.php" method="post">
        <div>
            <label for="album">Album :</label>
            <input type="text" id="album" name="album" required>
        </div>

        <div>
            <label for="artiste">Artiste :</label>
            <input type="text" id="artiste" name="artiste" required>
        </div>

        <div>
            <label for="genre">Genre :</label>
            <select id=genre name="genre" required>


                <?php foreach ($genres as $genre): ?>
                    <option value="<?= $genre['id'] ?>"><?= $genre['genre'] ?> </option>
                <?php endforeach; ?>


            </select>
        </div>

        <div>
            <button type="submit">Soumettre</button>
        </div>
    </form>


</body>

</html>