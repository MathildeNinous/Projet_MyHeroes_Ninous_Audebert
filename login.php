<?php
include("connectBDD.php");
session_start();

//Controles
if (!empty($_POST['login']) and !empty($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    if($BDD) {
        //voir si on peut faire une reqête préparée
        $maRequete = "SELECT * FROM joueur";
    
        // On exécute la requête en lui fournissant les variables à utiliser dans l’ordre
        $response = $BDD->query($maRequete);
        while($ligne = $response->fetch()) {
            if ($ligne["NomUtilisateur"]==$login && $ligne["Mdp"]==$mdp)
            {
                // Authentication succes
                $_SESSION['login'] = $login;
                header('Location: index.php');
            } else {
                $error = "Utilisateur non reconnu";
            }
        }
    }
}
?>

<!doctype html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Connexion</title>
        <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
    </head>

    <body>
    <div class="container">
        <h2 class="text-center">Connexion</h2>
            <div class="well">
                <form class="form-signin form-horizontal" role="form" action="traitementLogin.php" method="post">
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                            <input type="text" name="login" class="form-control" placeholder="Entrez votre login" required="" autofocus="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                            <input type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                            <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Se connecter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </body>

</html>