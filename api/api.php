<?php
include('../includes/function-pdo.php');

$action = $_GET['action'];
if ($action == "getalbum") {

    $albums = getAlbums($pdo);

    $table = ["message" => $albums];
    echo json_encode($albums);
}

if ($action == "insertion") {

    $r = file_get_contents('php://input');
    $r = json_decode($r, true);
    $album = $r['album'];
    $artiste = $r['artiste'];
    $genre = $r['genre'];

    $lastid = addAlbum($album, $artiste, $genre, $pdo);

    $message_reussie = [
        "message" => "insertion réussie",
        "message_id" =>  $lastid,
        "message_genre" => $genre
    ];
    $message_error = ["message" => "insertion échoué"];


    if ($lastid == true) {
        echo json_encode($message_reussie);
    } else {
        echo json_encode($message_error);
    }
}
