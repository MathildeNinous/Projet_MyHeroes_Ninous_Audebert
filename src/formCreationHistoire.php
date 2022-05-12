<?php
    require_once '../includes/head.php';
?>

<!doctype html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Création d'une histoire</title>
    </head>

    <body>
            <div class="container">
                <h3 class="text-center">Créé une nouvelle histoire !</h3>
                <form class="form-horizontal" height="100" role="form" action="traitementCreationHistPartie1.php" method="post">
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                            <input type="text" name="titre" class="form-control" placeholder="Titre de l'histoire" required="" autofocus="">
                        </div>
                    </div>
                    </div>
                    <div class="form-group m-2">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 w-100">
                            <textarea class="form-control" name="description" rows="3" placeholder="Description de l'histoire" required="" autofocus=""></textarea>    
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                            <textarea class="form-control" name="paragrapheMort" rows="3" placeholder="Entrez le message qui apparait si le héro meurt" required="" autofocus=""></textarea>    
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                            <label>Nombre de paragraphes : </label>
                            <input type="text" size="3" name="nbParagraphes" id="nbParagraphes" required/>
                            <button type="button" class="btn btn-primary" id="validNbParagraphes" onclick="afficherParagraphe()">Ok</button>
                        </div>
                    </div>
                    
                    <div id='paragraphesContainer' class="m-2 w-100"></div>

                    <div class="form-group m-2">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 w-100 d-flex justify-content-center">
                            <button type="submit" class="btn btn-default btn-primary m-1"><span class="glyphicon glyphicon-log-in"></span> Suivant</button>
                            <button type="reset" class="btn btn-default btn-primary m-1"><span class="glyphicon glyphicon-log-in"></span> Annuler</button>
                        </div>
                    </div>
                </form>
            </div>
        <script src="../js/creationHistoire.js"></script>
    </body>
</html>
