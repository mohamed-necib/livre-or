<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil</title>
</head>

<?php
session_start();

// CONNECTION A LA BDD
require_once "./includes/bdd.php";

// DECLARATION DES VARIABLES LIEES A LA SESSION
$login = $_SESSION['login'];
$password = $_SESSION['password'];

// RECUPERATION DES INFORMATIONS DE LA BDD
$sql = "SELECT login, password FROM utilisateurs WHERE login = '$login'";
$result = mysqli_query($conn, $sql);
$userDisplay = mysqli_fetch_array($result, MYSQLI_ASSOC);

// SI SUBMIT DU FORMULAIRE 
if (isset($_POST['envoyer'])) {

  // ON REMPLACE LES DONNEES DU CLIENTS PAR LES NOUVELLES DONNEES FOURNIES

  $newLogin = $_POST['login'];
  $newPassword = $_POST['password'];
  $newConf_pass = $_POST['conf-password'];

  // HASHAGE DU MDP
  $passwordHash = password_hash($newPassword, PASSWORD_ARGON2ID);


  // REQUETE DE MISE A JOUR DE LA BDD
  $sql = "UPDATE utilisateurs SET login='$newLogin', password='$passwordHash' WHERE login='$login'";
  $result = mysqli_query($conn, $sql);
  // MISE A JOUR DES VARIABLES DE SESSION
  $_SESSION['login'] = $newLogin;
  $_SESSION['password'] = $newPassword;
  header("Refresh:2");
}


?>

<body>
  <?php @include "./includes/header.php" ?>
  <main>
    <div class="wrapper">

      <!-- FORMULAIRE Modification de Compte-->
      <?php if (isset($_POST['envoyer'])) {
        echo $login . "<h3>Votre Profil a bien été modifié</h3>";
      } ?>
      <div class="form-wrapper sign-in" id="connect">
        <form action="" method="post">
          <?php if (isset($login)) {
            echo "<h2>Modifier vos informations " . $login . " ?</h2>";
          } else {
            echo "<h2> Hello </h2>";
          }
          ?>


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
          <?php if (isset($_POST['envoyer'])) {
            if ($newPassword !== $newConf_pass) {
              echo "Le mot de passe ne correspond pas";
            }
          } ?>
          <button type="submit" name="envoyer">Valider</button>
        </form>
      </div>
  </main>

  <?php @include "./includes/footer.php" ?>

</body>

</html>