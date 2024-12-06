<?php

include('includes/header.php');
include('includes/function-pdo.php');

$idalbum = 1;

if (isset($_GET['idalbum'])) {
  $idalbum = $_GET['idalbum'];
  $titres = getAllChansons($idalbum, $pdo);
}

if (!isset($_SESSION['email'])) {
  header('Location: login.php');
}

// TODO : fonction pour chercher les informations de l'album



?>

<body>
  <?php
  include('includes/navbar.php');
  ?>


  <div class="container">
    <h1><?= $_GET['album'] ?> par <?= $_GET['artiste'] ?></h1>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Chanson</th>
          <th scope="col" colspan="2">Action</th>

        </tr>
      </thead>
      <tbody>

        <?php

        for ($i = 0; $i < count($titres); $i++) {

        ?>
          <tr>
            <td><?= ($i + 1) ?></td>
            <td><?= $titres[$i]['titre'] ?></td>
            <td><a href="edit_chanson.php?idchanson=<?= $titres[$i]['id'] ?>&artiste=<?= $_GET['artiste'] ?>&album=<?= $_GET['album'] ?>&idalbum=<?= $_GET['idalbum'] ?>">Editer Chanson</td>
            <td><a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal" data-id="<?= $titres[$i]['id'] ?>" data-album="<?= $_GET['album'] ?>" data-artiste="<?= $_GET['artiste'] ?>" data-idalbum="<?= $_GET['idalbum'] ?>">Effacer Chanson</a></td>

          </tr>
        <?php
        }
        ?>


      </tbody>
    </table>

    <a href="add_chanson.php?idalbum=<?= $idalbum ?>&artiste=<?= $_GET['artiste'] ?>&album=<?= $_GET['album'] ?>" class="btn btn-primary">Ajouter une chanson</a>
  </div>

  <!-- Modale Bootstrap pour la confirmation de suppression -->
  <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmation de suppression</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        </div>
        <div class="modal-body"> Êtes-vous sûr de vouloir supprimer cette chanson ? </div>
        <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button> <a href="#" class="btn btn-danger" id="confirmDeleteBtn">Supprimer</a> </div>
      </div>
    </div>
  </div>

  <!-- Script pour gérer la suppression -->
  <script>
    $('#confirmDeleteModal').on('show.bs.modal', function(event) {
      let button = $(event.relatedTarget);
      let idChanson = button.data('id');
      let album = button.data('album');
      let artiste = button.data('artiste');
      let idAlbum = button.data('idalbum');
      let modal = $(this);
      modal.find('#confirmDeleteBtn').attr('href', 'effacer_chanson.php?idchanson=' + idChanson + '&album=' + album + '&artiste=' + artiste + '&idalbum=' + idAlbum);
    });
  </script>

</body>


<?php
include('includes/snippets.php');
?>

</html>