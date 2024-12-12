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
    <table id="ma_table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Album</th>
                <th>Artiste</th>
                <th>Genre</th>
            </tr>
        </thead>
        <tbody id="my_body">
        </tbody>
    </table>

    <div class="container">
        <h1>Ajout d'un album </h1>
        <form action="#" method="post" id="form">
            <div class="form-group">
                <label for="exampleInputtitre">Album</label>
                <input id="album" type="text" class="form-control" name="album" value="" required />
            </div>
            <div class="form-group">
                <label for="exampleInputtitre">Artiste</label>
                <input id="artiste" type="text" class="form-control" name="artiste" value="" required />
            </div>
            <div class="form-group">
                <label for="exampleInputtitre">Genre</label>
                <select class="form-control" id="genre" name="genre">
                    <?php
                    for ($i = 0; $i < count($genre); $i++) {
                    ?>

                        <option value="<?= $genre[$i]['id'] ?>"><?= $genre[$i]['genre'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <button id="ajout" type="submit" class="btn btn-primary">Ajouter</button>
            </div>

        </form>
    </div>

</body>
<script>
    let album = document.getElementById("album")
    let artiste = document.getElementById("artiste")
    let genre = document.getElementById("genre")
    let table = document.getElementById("ma_table")
    let my_body = document.getElementById("my_body")
    let form = document.getElementById("form")
    let bouton = document.getElementById("ajout")

    let url = "http://mini_projet.test/api/api2.php"

    //affichage des albums
    /* document.addEventListener("DOMContentLoaded", function(event) {

         fetch(url)
             .then(response => response.json())
             .then(data => {
                 //my_body.innerHTML = `<tr> <td> ${data[0]["idalbum"]} </td> <td> ${data[0]["album"]} </td> <td> ${data[0]["artiste"]} </td> <td> ${data[0]["genre"]} </td></tr>`
                 for (let i = 0; i < data.length; i = i + 1) {
                     my_body.innerHTML = my_body.innerHTML + `<tr> <td> ${data[i]["idalbum"]} </td> <td> ${data[i]["album"]} </td> <td> ${data[i]["artiste"]} </td> <td> ${data[i]["genre"]} </td></tr>`
                 }
             });

     })*/

    bouton.addEventListener("click", function(event) {
        event.preventDefault()

        let album2 = album.value

        let artiste2 = artiste.value

        let genre2 = genre.value


        fetch(url, {
                method: 'POST',
                body: JSON.stringify({
                    album: album2,
                    artiste: artiste2,
                    genre: genre2
                })

            })

            .then((response) => {
                return response.json();
            })

    })
</script>

</html>