<?php 
    session_start();
    require_once 'connectBDD.php';
    if(empty($_SESSION['nomUtilisateur'])){
      include '../includes/modalInscription.php';
    include '../includes/modalConnexion.php';}?>
<!doctype html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <title>BeHero </title>
    </head>
    <headear>
        <!--
        <nav class="navbar navbar-expand-lg navbar-fixed-top row">
            <h2 class="col-sm-3">BeHero</h2>
            <a class="col-sm-2" href="../src/index.php">Accueil</a>
            <a class="col-sm-2">Héro</a>
            <?php if (empty($_SESSION['nomUtilisateur'])){?> 
                <p class="col-sm-2" ><a href="../authentification/connexion.php">Connexion</a><a href="../authentification/inscription.php">/Inscription</a></p> 
            <?php } else { ?>
                <p class="col-sm-2" ><a href="../authentification/deconnexion.php">Deconnexion</a>
                <p class="col-sm-3"><?php echo $_SESSION['nomUtilisateur']?><img class="connexion" src="../img/connexion.png" alt="Connexion"></p>
                
            <?php } ?>
        </nav>-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark align">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">BeHero</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../src/index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../src/index.php">Statistique</a>
        </li>
      </ul>
    </div>
    
    <ul class="navbar-nav">
    <li class="nav-item dropdown">
    <?php if (empty($_SESSION['nomUtilisateur'])){?> 
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Connexion
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="../authentification/connexion.php" data-bs-toggle="modal" data-bs-target="#modalConnexion">Connexion</a></li>
            <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#modalInscription">Inscription</a></li>
          </ul>
                <?php } else { ?>
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?= $_SESSION['nomUtilisateur']?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Mon Hero</a></li>
            <li><a class="dropdown-item" href="../authentification/deconnexion.php">Deconnexion</a></li>
          </ul>
          <?php } ?>
        </li>   
    </ul>
  </div>
</nav>
    </header>
        <script src="../lib/jquery/jquery.min.js"></script>
        <script src="../lib/bootstrap/js/bootstrap.min.js"></script>