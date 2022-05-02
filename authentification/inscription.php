<?php
    include("../includes/scripts.php");
    require_once '../includes/head.php';
?>

<!doctype html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Inscription</title>
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
    <div class="container">
        <h2 class="text-center">Inscription</h2>
            <div class="well">
                <form class="form-signin form-horizontal" role="form" action="traitementInscription.php" method="post">
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                            <input type="text" name="nom" class="form-control" placeholder="Votre nom" required="" autofocus="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                            <input type="text" name="prenom" class="form-control" placeholder="Votre prénom" required="" autofocus="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                            <input type="text" name="nomUtilisateur" class="form-control" placeholder="Votre nom d'utilisateur" required="" autofocus="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                            <input type="password" name="mdp" class="form-control" placeholder="Votre mot de passe" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                            <input type="email" name="email" class="form-control" placeholder="Votre email" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                            <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> S'inscire</button>
                            <button type="reset" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Annuler</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script src="lib/jquery/jquery.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
