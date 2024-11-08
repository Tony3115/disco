<?php

function isValid($email, $password, $pdo)
{

    $sql = "SELECT email,password FROM utilisateurs WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetchAll();

    // si le compte de $result est supérieur à zéro, ça veut dire 
    // qu'il y a des données dans le tableau
    if (count($result) > 0) {

        // Dans une second temps on vérifie si le mot de pass est bon en 
        // le comparant avec celui de la base de données
        // la fonction password_verify s'occupe  de comparer $password qui est en claire
        // et $result[0]['password'] (originaire de la table utilisateur) qui est chiffré
        if (password_verify($password, $result[0]['password'])) {
            return true;
        }
    }

    return false;
}
