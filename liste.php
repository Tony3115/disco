<?php
include('includes/header.php');
include('includes/pdo.php');


// print_r($_SESSION);

if (!isset($_SESSION['email'])) {
  header('Location: login.php');
}
// Code pour avoir les informations des albums


$albums = [];

$albums = getAlbums($pdo);




?>

<body>
  <?php
  include('includes/navbar.php');
  ?>


  <div class="container">
    <h1>Page de Liste</h1>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Album</th>
          <th scope="col">Artiste</th>
          <th scope="col">Genre</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

        <?php

        for ($i = 0; $i < count($albums); $i++) {

        ?>
          <tr>
            <td><?= ($i + 1) ?></td>
            <td><a href="detail.php?idalbum=<?= $albums[$i]['idalbum'] ?>&artiste=<?= $albums[$i]['artiste'] ?>&album=<?= $albums[$i]['album'] ?>"><?= $albums[$i]['album'] ?></a></td>
            <td><?= $albums[$i]['artiste'] ?></td>
            <td><?= $albums[$i]['genre'] ?></td>
            <td><a href="edit_album.php?idalbum=<?= $albums[$i]['idalbum'] ?>">Editer Album</td>
            </td>
            <td><a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal" data-id="<?= $albums[$i]['idalbum'] ?>">Effacer Album</a></td>
          </tr> <?php } ?>
      </tbody>
    </table>

  </div> <!-- Modale Bootstrap pour la confirmation de suppression -->
  <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmation de suppression</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        </div>
        <div class="modal-body"> Êtes-vous sûr de vouloir supprimer cet album ? </div>
        <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button> <a href="#" class="btn btn-danger" id="confirmDeleteBtn">Supprimer</a> </div>
      </div>
    </div>
  </div>

  <!-- Script pour gérer la suppression -->
  <script>
    $('#confirmDeleteModal').on('show.bs.modal', function(event) {
      let button = $(event.relatedTarget);
      let idAlbum = button.data('id');
      var modal = $(this);
      modal.find('#confirmDeleteBtn').attr('href', 'effacer_album.php?idalbum=' + idAlbum);
    });
  </script>

  </html>