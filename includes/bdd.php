<!-- CONNEXION A LA BDD -->
<?php
$hostName = "localhost";
$dbUSer = "root";
$dbPassword = "root";
$dbName = "livreor";

$conn=mysqli_connect($hostName, $dbUSer, $dbPassword, $dbName);

if(!$conn) {
  die("La connexion a échouée");
}

?>