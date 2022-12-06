<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="/../livre-or/assets/css/style.css"> -->
  <title>Page Identification</title>
</head>

<?php
// <!-- PHP INSCRIPTION --> //

//  PREPARATION DES VARIABLES RECUPEREES DANS LE FORMULAIRE

if (isset($_POST['inscription'])) {
  $login = $_POST['login'];
  $password = $_POST['password'];
  $conf_pass = $_POST['conf-password'];


  // HASHAGE MOT DE PASSE

  $passwordHash = password_hash($password, PASSWORD_ARGON2ID);

  // DECLARATION VARIABLES ERREURS

  $errors = array();

  //VERIFICATION REMPLISSAGE DE TOUS LES CHAMPS DU FORMULAIRE

  if (empty($login) or empty($password) or empty($conf_pass)) {
    array_push($errors, "Tous les champs doivent être remplis");
  }

  //COMPARAISON MOT DE PASSE ET CONFIRMATION MOT DE PASSE

  if ($password !== $conf_pass) {
    array_push($errors, "Le mot de passe ne correspond pas");
  }

  //CONNEXION A LA BDD

  require_once "includes/bdd.php";

  //VERIFICATION SI USER DEJA EXISTANT
  $sql = "SELECT * FROM utilisateurs WHERE login='$login'";
  $result = mysqli_query($conn, $sql);
  $rowCount = mysqli_num_rows($result);
  if ($rowCount > 0) {
    array_push($errors, "Le Login existe déjà");
  }

  if (count($errors) > 0) {
    foreach ($errors as $error) {
      echo $error;
    }
  } else {

    
  }
}


?>

<body>
  <?php include "includes/bdd.php" ?>
  <?php include "includes/header.php"  ?>
  <main>
    <div class="wrapper">

      <!-- FORMULAIRE CONNEXION -->

      <div class="form-wrapper sign-in" id="connect">
        <form action="" method="post">
          <h2>Se Connecter</h2>
          <div class="input-group">
            <input type="text" name="login" autocomplete="off">
            <label for="login">Login</label>
          </div>
          <div class="input-group">
            <input type="password" name="password" autocomplete="off">
            <label for="password">Mot de Passe</label>
          </div>
          <div class="remember">
            <label><input type="checkbox">Se Souvenir de Moi</label>
          </div>
          <button type="submit" name="connexion">Se connecter</button>
          <div class="signUp-link">
            <p>Pas encore de compte? <a href="/../livre-or/formulaires.php/#inscription" class="signUpBtn-link">S'inscrire</a></p>
          </div>
        </form>
      </div>

      <!-- FORMULAIRE INSCRIPTION -->

      <div class="form-wrapper sign-up" id="inscription">
        <form action="" method="post">
          <h2>S'inscrire</h2>
          <div class="input-group">
            <input type="text" name="login" autocomplete="off">
            <label for="login">Login</label>
          </div>
          <div class="input-group">
            <input type="password" name="password" autocomplete="off">
            <label for="password">Mot de Passe</label>
          </div>
          <div class="input-group">
            <input type="password" name="conf-password" autocomplete="off">
            <label for="conf-password">Confirmer Mot de Passe</label>
          </div>
          <div class="remember">
            <label><input type="checkbox">Se Souvenir de Moi</label>
          </div>
          <button type="submit" name="inscription">S'inscrire</button>
          <div class="signUp-link">
            <p>Déjà un compte? <a href="/../livre-or/formulaires.php/#connect" class="signInBtn-link">Se Connecter</a></p>
          </div>
        </form>
      </div>
    </div>
  </main>



  <?php include "includes/footer.php" ?>
  <script src="/../livre-or/assets/JS/script.js"></script>
</body>

</html>