<?php
// démarrer une session
session_start();
include './includes/bdd.php';
// include './includes/header.php';

// RECUPERATION DES COMMENTAIRES POUR AFFICHAGE
$sql = "SELECT DATE_FORMAT (commentaires.date,'%d/%m/%Y'),utilisateurs.login, commentaires.commentaire FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur=utilisateurs.id ORDER BY date DESC";
$result = mysqli_query($conn, $sql);
$displayComments = mysqli_fetch_all($result);
// var_dump($displayComments);


// echo $date;
$i = -1;
foreach ($displayComments as $comments) {
  foreach ($comments as $value) {
    $i++;
    echo $displayComments[$i][1] . "<br>";
    break;
  }
  //AFFICHAGE DES COMMENTAIRES

};

?>

<body>




</body>
