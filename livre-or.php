<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Livre d'Or</title>
</head>



<?php
// démarrer une session
session_start();
include './includes/bdd.php';
include './includes/header.php';

// RECUPERATION DES COMMENTAIRES POUR AFFICHAGE
$sql = "SELECT DATE_FORMAT (commentaires.date,'%d/%m/%Y - %H:%i:%s'),utilisateurs.login, commentaires.commentaire FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur=utilisateurs.id ORDER BY date DESC";
$result = mysqli_query($conn, $sql);
$displayComments = mysqli_fetch_all($result);
// var_dump($displayComments);

?>

<body>

  <body>
    <main>
      <div class="commentaires_container">
        <?php
        $i = -1;
        foreach ($displayComments as $comments) {
          foreach ($comments as $value) {
            $i++;
            echo
            '
        <div class="commentaires_container">
        <div class="comment_container">
          <div class="comment_card">
            <h3 class="comment_title">' . $displayComments[$i][2]  . '</h3>
            <p>' . $displayComments[$i][1] . '</p>
            <div class="comment_footer">
              <div class="comment_date">' .
              $displayComments[$i][0] .
              '</div>
            </div>
          </div>
        </div>
      </div>
      ';
            break;
          }
        };

        ?>
      </div>


    </main>



    <?php include './includes/footer.php'; ?>
  </body>

</html>