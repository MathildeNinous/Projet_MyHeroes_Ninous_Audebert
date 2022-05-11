<?php
    include("../includes/connectBDD.php");
    require_once '../includes/head.php';

//TRAITEMENT DONNEES PREMIERE PARTIE DU FORMULAIRE
if (isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['paragraphe']) && isset($_POST['reponse'])  && isset($_POST['capacite'])) {
    $titre=$_POST['titre'];
    $description=$_POST['description'];
    $paragraphe = $_POST['paragraphe'];
    $capacite = $_POST['capacite'];
    $reponse = $_POST['reponse'];
    $nbParagraphe = $_POST['nbParagraphes']-1;

    //creation de l'histoire avec titre/description
    $sql = "INSERT INTO histoire(Titre, Description, PremierParagraphe) VALUES (?,?,null)";
    $query = $bdd->prepare($sql);
    $query->execute([$titre, $description]);

    //on récupere l'id de l'histoire qui vient d'être créée
    $idHistoireCree = $bdd->lastInsertId();

    for($i=0; $i <count($paragraphe); $i++) {
        //on insert les paragraphes
        $sql2 = "INSERT INTO paragraphe(Description, IdHistoire, Capacite) VALUES (?,?,?)";
        $query2 = $bdd->prepare($sql2);
        $query2->execute([$paragraphe[$i],$idHistoireCree, $capacite[$i]]);

        //recuper l'id du premier paragraphe
        $sqlIdP1 = "SELECT * FROM paragraphe WHERE Description=?";
        $queryIdP1 = $bdd->prepare($sqlIdP1);
        $queryIdP1->execute([$paragraphe[0]]);
        $idParagraphe = $queryIdP1->fetch();

        //premier paragraphe
        $sqlP1 = "UPDATE histoire SET PremierParagraphe=? WHERE Id = ?";
        $queryP1 = $bdd->prepare($sqlP1);
        $queryP1->execute([$idParagraphe['Id'], $idHistoireCree]);

        //recupere l'id de tous les paragraphes que je viens de créer
        $sqlIdP = "SELECT Id FROM paragraphe WHERE Description=?";
        $queryIdP = $bdd->prepare($sqlIdP);
        $queryIdP->execute([$paragraphe[$i]]);
        $idParagraphes = $queryIdP->fetch();

        
        
    }    

}

?>

<!-- DEUXIEME PARTIE DU FORMULAIRE -->
<!doctype html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Création d'une histoire</title>
    </head>

    <body>
        <div class="well">
            <h2 class="text-center">Voici les paragraphes de l'histoire que tu t'apprètes à créer</h2>
            <h3 class="text-center">Pour CHACUN des paragraphes, choisissez les réponses sortantes !</h3>
                <form class="form-horizontal" height="100" role="form" action="traitementCreationHistPartie2.php" method="post">    
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                            <?php
                            for($i=0; $i <count($paragraphe) ; $i++) { ?>
                                <h3>Paragraphe <?=$i+1?></h3>
                                <textarea readonly class="form-control" rows="6" name="paragraphe" value="<?=$idParagraphes['Id']?>"><?=$paragraphe[$i]?></textarea>
                                <input type="hidden" name="reponse" value="<?=$reponse[$i]?>">
                                <br>
                                <?php for($k=0; $k<$nbParagraphe; $k++) { ?>
                                    <select name="reponseSortante[]" class="form-control" aria-label="Default select example">
                                        <?php for($j=0; $j<count($reponse); $j++) { ?>    
                                            <option value="<?=$reponse[$j]?>">
                                                <?=$reponse[$j]?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <br>
                                <?php } } ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                            <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Terminer</button>
                            <button type="reset" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Annuler</button>
                        </div>
                    </div>
                </form>
            </div>
    
        <script src="../js/creationHistoire.js"></script>
    </body>
</html>

