<?php
include('includes/header.php');
include('includes/pdo.php');


// print_r($_SESSION);

if (!isset($_SESSION['email'])) {
  header('Location: http://mini_projet.test/login.php');
}
// Code pour avoir les informations des disques


$disques = [];

$disques = getDisques($pdo);

function getDisques($pdo)
{

  $sql = "SELECT D.id as idalbum,album,artiste, G.genre FROM disques D INNER JOIN genre G ON G.id = D.genre";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}


?>

<body>
  <?php
  include('includes/navbar.php');
  ?>
  <h1>Page de Liste</h1>

  <div class="container">

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Album</th>
          <th scope="col">Artiste</th>
          <th scope="col">Genre</th>
        </tr>
      </thead>
      <tbody>

        <?php

        for ($i = 0; $i < count($disques); $i++) {

        ?>
          <tr>
            <th scope="row"><?= $i + 1 ?></th>
            <td><a href="detail.php?idalbum=<?= $disques[$i]['idalbum'] ?>"><?= $disques[$i]['album'] ?></a></td>
            <td><?= $disques[$i]['artiste'] ?></td>
            <td><?= $disques[$i]['genre'] ?></td>
          </tr>
        <?php

        }

        ?>


      </tbody>
    </table>
  </div>

</body>
<?php
include('includes/snippets.php');
?>

</html>