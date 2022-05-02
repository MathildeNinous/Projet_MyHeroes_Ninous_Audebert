<?php 
    session_start();
    require_once 'connectBDD.php';?>
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
        <nav class="navbar navbar-expand-lg navbar-fixed-top row ">
            <h2 class="col-sm-4">BeHero</h2>
            <a class="col-sm-2" href="../src/index.php">Accueil</a>
            <a class="col-sm-2">Héro</a>
            <p class="col-sm-2" ><a href="../authentification/connexion.php">Connexion</a><a href="../authentification/inscription.php">/Inscription</a></p>
        </nav>
    </header>
        <script src="../lib/jquery/jquery.min.js"></script>
        <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
</html>
