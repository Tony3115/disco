<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php
      if (isset($_SESSION['email'])) {
      ?>
        <li class="nav-item">
          <a class="nav-link" href="liste.php">Liste des Albums</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="add_album.php">Ajouter Album</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      <?php
      } else {

      ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      <?php
      }
      ?>

    </ul>
  </div>
</nav>