<?php
include('../includes/function-pdo.php');


$albums = getAlbums($pdo);


$table = ["message" => $albums];
echo json_encode($albums);
