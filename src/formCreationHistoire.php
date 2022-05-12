<?php
    require_once '../includes/head.php';
?>

<!doctype html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Création d'une histoire</title>
    </head>
    <body style="background-color:#A9A9A9">
            <div class="container w-50">
                <h2 class="text-center mt-4">Créé une nouvelle histoire !</h2>
                <form class="form-horizontal w-100" height="100" role="form" action="traitementCreationHistPartie1.php" method="post">
                    <div class="form-group w-100 mb-2">
                        <div>
                            <input type="text" name="titre" class="form-control" placeholder="Titre de l'histoire" required="" autofocus="">
                        </div>
                    </div>
                    <div class="form-group w-100 mb-2">
                        <div class="w-100">
                            <textarea class="form-control" name="description" rows="3" placeholder="Description de l'histoire" required="" autofocus=""></textarea>    
                        </div>
                    </div>
                    <div class="form-group w-100 mb-2">
                        <div class="w-100">
                            <textarea class="form-control" name="paragrapheMort" rows="3" placeholder="Entrez le message qui apparait si le héro meurt" required="" autofocus=""></textarea>    
                        </div>
                    </div>
                    <div class="form-group w-100">
                        <div class="w-100">
                            <label>Nombre de paragraphes : </label>
                            <input type="text" size="3" name="nbParagraphes" id="nbParagraphes" required/>
                            <button type="button" class="btn btn-light" id="validNbParagraphes" onclick="afficherParagraphe()">Ok</button>
                        </div>
                    </div>
                    
                    <div id='paragraphesContainer'></div>

                    <div class="form-group mt-3">
                        <div class="w-100 d-flex justify-content-center">
                            <button type="submit" class="btn btn-default btn-primary m-1"><span class="glyphicon glyphicon-log-in"></span> Suivant</button>
                            <button type="reset" class="btn btn-default btn-primary m-1"><span class="glyphicon glyphicon-log-in"></span> Annuler</button>
                        </div>
                    </div>
                </form>
            </div>
        <script src="../js/creationHistoire.js"></script>
    </body>
</html>
