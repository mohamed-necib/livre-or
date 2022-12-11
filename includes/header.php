<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/../livre-or/assets/css/style.css">

  <title>Header
  </title>
</head>

<body>
  <nav>
    <a href="/../livre-or/index.php" class="nav-logo" aria-label="visit homepage" aria-current="page">
      <img src="/../livre-or/assets/img/khemsa.svg" alt="Logo-Khemsa" class="logo">
      <span>HelloWorld</span>
    </a>
    <div class="main-nav-links">
      <button class="hamburger" type="button" aria-label="Toggle button" aria-expanded="false">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
    <div class="nav-links-container">
      <a href="/../livre-or/index.php">Accueil</a>
      <?php if (isset($_SESSION['login'])) : ?>
        <a href="/../livre-or/profil.php">Profil</a>
        <a href="/../livre-or/livre-or.php">Livre D'Or</a>
        <a href="/../livre-or/commentaire.php">Laisser un commentaire</a>

      <?php endif; ?>
    </div>
    <div class="nav-authentication">
      <a href="" class="user-toggler" aria-label="Sign in page">
        <img src="/../livre-or/assets/img/user.svg" alt="user-icon">
      </a>

      <div class="sign-buttns">
        <?php if (!isset($_SESSION['login'])) : ?>
          <button type="button" class="sigInBtn"><a href="/../livre-or/formulaires.php#connect">Se connecter</a></button>
          <button type="button" class="sigUpBtn"><a href="/../livre-or/formulaires.php#inscription">S'inscrire</a></button>
        <?php endif; ?>
        <?php if (isset($_SESSION['login'])) : ?>
          <button type="button" class="decoBtn"><a href="/../livre-or/includes/deconnect.php">Deconnexion</a></button>
        <?php endif; ?>
      </div>

    </div>
  </nav>
  <script src="/../livre-or/assets/JS/nav.js"></script>




</body>

</html>