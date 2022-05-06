<?php
include("../includes/connectBDD.php");

if (isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['paragraphe']) && isset($_POST['reponse'])) {
    $titre=$_POST['titre'];
    $description=$_POST['description'];
    $paragraphe = $_POST['paragraphe'];
    
    //creation de l'histoire avec titre/description
    $sql = "INSERT INTO histoire(Titre, Description, PremierParagraphe) VALUES (?,?,null)";
    $query = $bdd->prepare($sql);
    $query->execute([$titre, $description]);

    //on récupere l'id de l'histoire qui vient d'être créée
    $idHistoireCree = $bdd->lastInsertId();

    for($i=0; $i <count($paragraphe) ; $i++) {
        //on insert les paragraphes
        $sql2 = "INSERT INTO paragraphe(Description, IdHistoire) VALUES (?,?)";
        $query2 = $bdd->prepare($sql2);
        $query2->execute([$paragraphe[$i],$idHistoireCree]);

        //recuper l'id du premier paragraphe
        $sqlIdP1 = "SELECT * FROM paragraphe WHERE Description=?";
        $queryIdP1 = $bdd->prepare($sqlIdP1);
        $queryIdP1->execute([$paragraphe[0]]);
        $idParagraphe = $queryIdP1->fetch();

        //premier paragraphe
        $sqlP1 = "UPDATE histoire SET PremierParagraphe=? WHERE Id = ?";
        $queryP1 = $bdd->prepare($sqlP1);
        $queryP1->execute([$idParagraphe['Id'], $idHistoireCree]);
    }    

}

?>