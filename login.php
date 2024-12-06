<?php

include('includes/header.php');
include('includes/pdo.php');


// je vérifie que email et password ne soient pas vide
// je vais chercher dans la table utilisateur que l'utilisateur existe
// si n'existe pas je redirige vers error.php avec un message d'erreur (contient un lien pour rediriger vers index.php)
// si l'utilisateur existe on va définir une session authentifiée (l'utilisateur est loggé))
// si connecté propose le logout
if (count($_POST) > 0) {
  if (isValid($_POST['email'], $_POST['password'], $pdo)) {
    $_SESSION['email'] = $_POST['email'];
    header('Location: liste.php');
    exit;
  } else {
    $loginError = true;
  }
} else {
?>

<?php
}
?>

<body>
  <?php
  include('includes/navbar.php');
  ?>

  <div class="container">
    <h1>Page de login</h1>

    <form action="login.php" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input required type="email" class="form-control" name="email" id="exampleInputEmail1" value="yvon@gmail.com" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input required type="password" name="password" class="form-control" id="exampleInputPassword1">
      </div>
      <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
  </div>

  <?php
  include('includes/snippets.php');
  ?>

  <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="errorModalLabel">Erreur de connexion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Email ou mot de passe incorrect.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>


  <?php
  if (isset($loginError) && $loginError) : ?>
    <script>
      $(document).ready(function() {
        $('#errorModal').modal('show');
      });
    </script>
  <?php endif; ?>

  <!-- Script de validation Bootstrap -->
  <script>
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('form-control');
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>

</body>

</html>