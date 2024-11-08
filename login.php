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
  } else {
    header('Location: login.php');
  }
} else {

?>

  <body>
    <?php
    include('includes/navbar.php');
    ?>
    <h1>Page de login</h1>

    <div class="container">

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

  </body>
  <?php
  include('includes/snippets.php');
  ?>

  </html>

<?php
}
?>