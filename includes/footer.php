<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Footer</title>
</head>

<body>
  <footer>
    <div class="social">
      <a href="#"><i class="fab fa-facebook"></i></a>
      <a href="https://github.com/mohamed-necib/module-connexion.git"><i class="fab fa-github"></i></a>
      <a href="https://www.linkedin.com/in/mohamed-el-amine-necib-9178a417b/"><i class="fab fa-linkedin"></i></a>
    </div>
    <ul class="list">
      <li><a href="/../livre-or/index.php">Accueil</a></li>
      <?php if (!isset($_SESSION['login'])) : ?>
        <li class="signInAncre"><a href="/../livre-or/formulaires.php/#connect">Connexion</a></li>
        <li class="signUpAncre"><a href="/../livre-or/formulaires.php/#inscription">Inscription</a></li>
      <?php else : ?>
        <li><a href="/../livre-or/includes/deconnect.php">Deconnexion</a></li>
      <?php endif; ?>
    </ul>
    <p class="copyright">
      Ntik/Dev - 2022 ©
    </p>
  </footer>
</body>

</html>