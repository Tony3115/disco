<?php

include('includes/header.php');

print_r($_SESSION);

$idalbum = 1;

if (isset($_GET['idalbum'])) {
  $idalbum = $_GET['idalbum'];
}

// TODO : fonction pour chercher les informations de l'album
//exercice 20
function getDisquesById($pdo, $idalbum)
{

  $sql = "SELECT D.id as idalbum,album,artiste, G.genre FROM disques D INNER JOIN genre G ON G.id = D.genre WHERE D.id = :idalbum";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':idalbum', $idalbum);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}


$disque = getDisquesById($pdo, $idalbum);


if (!isset($_SESSION['email'])) {
  header('Location: http://mini_projet.test/login.php');
}
?>

<body>
  <?php
  include('includes/navbar.php');
  ?>
  <h1>Page de détail</h1>

  <div class="container">

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Album</th>
          <th scope="col">Artiste</th>
          <th scope="col">Genre</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <td><?= ($disque[0]['album']) ?></td>
          <td><?= ($disque[0]['artiste']) ?></td>
          <td><?= ($disque[0]['genre']) ?></td>
        </tr>
        <?php



        ?>


      </tbody>
    </table>
  </div>

</body>


<?php
include('includes/snippets.php');
?>

</html>