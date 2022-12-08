<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/../livre-or/assets/css/style.css">
  <title>Page Identification</title>
</head>

<?php
// <!-- PHP INSCRIPTION --> //
// INITIATION DE LA VARIABLE DE SESSION
session_start();

// SI L UTILISATEUR EST DEJA LOGGED ALORS IL EST REORIENTE VERS SA PAGE DE PROFIL

if (isset($_SESSION["login"])) {
  header("Location: profil.php");
  exit;
}

//  PREPARATION DES VARIABLES RECUPEREES DANS LE FORMULAIRE

if (isset($_POST['inscription'])) {
  $login = $_POST['login'];
  $password = $_POST['password'];
  $conf_pass = $_POST['conf-password'];


  // HASHAGE MOT DE PASSE

  $passwordHash = password_hash($password, PASSWORD_ARGON2ID);

  // DECLARATION VARIABLES ERREURS POUR MESSAGE D'ERREUR DANS LE FORMULAIRE

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
    array_push($errors, "</br> Le Login existe déjà");
  }

  if (count($errors) > 0) {
    foreach ($errors as $error) {
      //RECUPERATION MESSAGE D'ERREUR ET INJECTION DANS LE FORMULAIRE
    }
  } else {

    //AJOUT D'UN NOUVEL UTILISATEUR

    $sql = "INSERT INTO utilisateurs (login, password) VALUES (?, ?)";

    //INITIALISATION DE L'OBJET DE COMMANDE

    $stmt = mysqli_stmt_init($conn);

    //PREPARATION DE LA REQUETE SQL POUR L'EXECUTION

    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

    if ($prepareStmt) {
      mysqli_stmt_bind_param($stmt, "ss", $login, $passwordHash);
      mysqli_stmt_execute($stmt);
      //MESSAGE DE VALIDATION DE LA CONNEXION
    } else {
      die();
      //MESSAGE ERREUR DE CONNEXION
    }
  }
}

// <=========== PHP CONNEXION ===========>

// CONNEXION A LA BASE DE DONNEES

require_once "includes/bdd.php";

//VERIFICATION REMPLISSAGE DES CHAMPS DU FORMULAIRE 

if (isset($_POST['connexion'])) {
  $login = $_POST['login'];
  $password = $_POST['password'];



  $successes = array();

  // RECUPERATION DE L'UTILSATEUR

  $sql = "SELECT * FROM utilisateurs WHERE login = '$login'";
  $result = mysqli_query($conn, $sql);
  $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
  /* var_dump($user); */



  //VERIFICATION DES DONNEES DE L'UTILISATEUR
  if ($user) {

    if (password_verify($password, $user['password'])) {

      $_SESSION['login'] = $login;
      $_SESSION['password'] = $password;

      //INJECTION MESSAGE SUCCESS DANS LE FORMULAIRE

      array_push($successes, "Connexion Reussie, vous allez être redirigé");

      //REDIRECTION VERS LA PAGE PROFIL DE L'UTILISATEUR

      header('Refresh:2; url=profil.php');
    }

    // INJECTION MESSAGE ERREUR DANS LE FORMULAIRE

  } else {

    array_push($successes, "Le login n'existe pas, veuillez vous créer un compte");
  }
  if (count($successes) > 0) {
    foreach ($successes as $success) {
      //MESSAGE ERREUR OU SUCCESS
    }
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
          <?php if (isset($success)) {
            echo $success . "</br>";
          } ?>
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
          <?php if (isset($error)) {
            echo $error . '</br>';
          }
          if (isset($prepareStmt)) {
            echo '"Vous êtes bien connécté"</br>';
          }  ?>
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