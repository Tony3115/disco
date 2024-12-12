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

    $result = addAlbum($album, $artiste, $genre, $pdo);

    $message = ["message" => "insertion réussie"];
    $message2 = ["message" => "insertion échoué"];


    if ($result == true) {
        echo json_encode($message);
    } else {
        echo json_encode($message2);
    }
}
