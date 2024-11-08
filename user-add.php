<?php
include('includes/header.php');
include('includes/pdo.php');

if (!isset($_SESSION['email'])) {
  header('Location: http://mini_projet.test/login.php');
}

?>

<body>
  <?php
  include('includes/navbar.php');


  // je vérifie que email et password ne soient pas vide
  // je vérifie que l'utilisateur n'existe pas déjà
  // je chiffre le password avec bcrypt

  if (isset($_POST['password'])) {
    $crypted_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];
    echo $crypted_password;
    echo $email;
    $res = addUser($email, $crypted_password, $pdo);
    if ($res) {
      echo 'Création utilisateur réussie';
    }
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
  ?>



  <div class="container">
    <h1>Création d'un utilisateur</h1>
    <form action="user-add.php" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input required type="email" class="form-control" name="email" id="exampleInputEmail1" value="toto@gmail.com" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input required type="password" name="password" class="form-control" id="exampleInputPassword1">
      </div>
      <button type="submit" class="btn btn-primary">Créer un utilisateur</button>
    </form>
  </div>

</body>
<?php
include('includes/snippets.php');
?>

</html>