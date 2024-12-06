<?php
include('pdo.php');
//pour vérifier l'email et le password
function isVAlid($email, $password, $pdo)
{


    $sql = "SELECT email,password FROM utilisateurs WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (count($result) > 0) {


        if (password_verify($password, $result[0]['password'])) {
            return true;
        }
    }

    return false;
}

/*prends les données de genre dans la base de données
 */
function getGenre($pdo)
{
    $sql = "SELECT * FROM genres";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $genres = $stmt->fetchALL(PDO::FETCH_ASSOC);

    return $genres;
}

/*demande les données d'un seul album
 */
function getAlbum($idalbum, $pdo)
{

    $sql = "SELECT album, artiste, genre FROM albums WHERE id = :idalbum";
    $stmt = $pdo->prepare($sql);
    $params = ['idalbum' => $idalbum];
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

/*demande les données de chaque albums
 */
function getAlbums($pdo)
{


    $sql = "SELECT A.id as idalbum,album,artiste, G.genre FROM albums A INNER JOIN genres G ON G.id = A.genre";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/**
 * crée de nouvelles données pour album
 */
function addAlbum($album, $artiste, $genre, $pdo)
{

    echo "Album inséré";
    $sql = "INSERT INTO `albums` ( `album`, `artiste`, `genre`) 
    VALUES (:album, :artiste, :genre);";

    $stmt = $pdo->prepare($sql); // prepare la requête sql
    $params = [
        'album' => $album,
        'artiste' => $artiste,
        'genre' => $genre,
    ]; // les paramètres à mettre dans la requête sql

    $result = $stmt->execute($params);
    return $result;
}


//edite un album
function editAlbum($idalbum, $album, $artiste, $genre, $pdo)
{

    echo "Album inséré";
    $sql = "UPDATE `albums` 
    SET `album` = :album, `artiste` = :artiste, `genre` = :genre 
    WHERE id =:idalbum;";

    $stmt = $pdo->prepare($sql); // prepare la requête sql
    $params = [
        'idalbum' => $idalbum,
        'album' => $album,
        'artiste' => $artiste,
        'genre' => $genre,
    ]; // les paramètres à mettre dans la requête sql

    $result = $stmt->execute($params);
    return $result;
}


//efface un album
function effacerAlbum($idalbum, $pdo)
{

    echo "Album effacé";
    $sql = "DELETE FROM `albums`  WHERE id =:idalbum;DELETE FROM `chansons`  WHERE idalbum =:idalbum;";

    $params = [
        'idalbum' => $idalbum,
    ]; // les paramètres à mettre dans la requête sql


    $stmt = $pdo->prepare($sql); // prepare la requête sql
    $result = $stmt->execute($params);
    return $result;
}

//accède aux données des chansons
function getChanson($idchanson, $pdo)
{

    $sql = "SELECT titre FROM chansons WHERE id = :idchanson";
    $stmt = $pdo->prepare($sql);
    $params = ['idchanson' => $idchanson];
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function getAllChansons($idalbum, $pdo)
{

    $sql = "SELECT id, idalbum, titre 
  FROM chansons 
  WHERE idalbum = :idalbum";
    $params = ['idalbum' => $idalbum];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}



//edite une chanson
function editChanson($idchanson, $titre, $pdo)
{

    $sql = "UPDATE `chansons` 
    SET `titre` = :titre
    WHERE id =:idchanson;";


    $params = [
        'idchanson' => $idchanson,
        'titre' => $titre,
    ]; // les paramètres à mettre dans la requête sql


    $stmt = $pdo->prepare($sql); // prepare la requête sql
    $result = $stmt->execute($params);
    print_r($stmt->errorInfo());
    return $result;
}

//rajoute une chanson
function addChanson($idalbum, $titre, $pdo)
{

    echo "Chanson insérée";
    $sql = "INSERT INTO `chansons` ( `idalbum`, `titre`) 
    VALUES (:idalbum, :titre);";

    $stmt = $pdo->prepare($sql); // prepare la requête sql
    $params = [
        'idalbum' => $idalbum,
        'titre' => $titre,

    ]; // les paramètres à mettre dans la requête sql

    $result = $stmt->execute($params);
    return $result;
}

//efface une chanson
function effacerChanson($idchanson, $pdo)
{

    echo "Chanson effacé";
    $sql = "DELETE FROM `chansons` 
    WHERE id =:idchanson;";

    $params = [
        'idchanson' => $idchanson,
    ]; // les paramètres à mettre dans la requête sql


    $stmt = $pdo->prepare($sql); // prepare la requête sql
    $result = $stmt->execute($params);
    return $result;
}


//insertion dans la base de donnée
function addUser($email, $password, $pdo)
{

    $sql = "INSERT INTO utilisateurs (email,password) VALUES (:email,:password)";
    $stmt = $pdo->prepare($sql);
    $params = ['email' => $email, 'password' => $password];
    $result = $stmt->execute($params);
    return $result;
}
