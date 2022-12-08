<?php
session_start();
@include './includes/header.php';
@include './includes/bdd.php';

if (!isset($_POST['submit'])) {
  $_POST['commentaire'] = "";
  $_POST['login'] = "";
}

$commentaires = htmlspecialchars($_POST['commentaire']);
$commentaires = nl2br($commentaires);

// RECUPERATION DU CONTENU DE LA BDD
$login = $_SESSION['login'];
$sql = "SELECT * FROM utilisateurs WHERE login='$login'";
$result = mysqli_query($conn, $sql);
$displayInfo = mysqli_fetch_array($result, MYSQLI_ASSOC);

// var_dump($displayUser);

// RECUPERATION DE L'ID DU USER ET CHANGEMENT DU TYPE
$id = $displayInfo['id'];
$intID = (int)$id;

// MISE EN BDD DU COMMENTAIRE AU SUBMIT
if (isset($_POST['submit'])) {

  // RESET DU FORMAT DE LA DATE POUR LA DB
  /* $date = date('Y-m-d H:i:s'); */
  //AJOUT DU COMMENTAIRE AVEC LES DONNEES DU USER
  $sql = "INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES ('$commentaires', '$intID', NOW())";
  $result = mysqli_query($conn, $sql);
  header("Refresh:2");
  echo "Votre commentaire a bien été publié";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/../livre-or/assets/css/style.css" />
  <title>Laisser un commentaire</title>
</head>

<body>
  <main>
    <div class="wrapper">
      <div class="form-wrapper">
        <h2>Ajouter un commentaire</h2>
        <div class="formContainer">
          <form action="" method="post">
            <textarea name="commentaire" placeholder="Écrire ici..." style="height: 100px" required></textarea>
            <input type="submit" name="submit" value="Publier votre commentaire">
          </form>
        </div>
      </div>
    </div>
  </main>


</body>

<?php
include './includes/footer.php';
?>

</body>

</html>