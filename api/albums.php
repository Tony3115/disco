<?php

include('../includes/header.php');
include('../includes/function-pdo.php');

$albums = getAlbums($pdo);
$genre = getGenre($pdo);
?>

<head>
    <meta charset="UTF-8">
    <title>Liste des Albums</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border: 1px solid black;
        }

        th {
            background-color: #009879;
            color: #fff;
        }
    </style>
</head>

<body>
    <h1>Liste des Albums</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Album</th>
                <th>Artiste</th>
                <th>Genre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            print_r($albums);
            foreach ($albums as $album): ?>
                <tr>
                    <td><?php echo htmlspecialchars($album['idalbum'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($album['album'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($album['artiste'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($album['genre'], ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

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
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>

        </form>
    </div>

</body>

</html>