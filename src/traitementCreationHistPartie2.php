<?php
    include("../includes/connectBDD.php");

    $reponseSortante = $_POST['reponseSortante'];
    $paragraphe= $_POST['idParagraphe'];

for($j=0; $j<count($paragraphe); $j++) {
    for($i=$j*2; $i<=($j*2+count($paragraphe)-2); $i++){
        ?>        
        <?php
        $reponseRequete = $bdd->prepare("SELECT * from reponse where description = ?");
        $reponseRequete->execute([$reponseSortante[$i]]);
        $reponse = $reponseRequete->fetch();
        
        if($reponseRequete->rowCount() != 0){
            if($reponse['Id'] == 0){
                $reponseId = null;
            }else{
                $reponseId = $reponse['Id'];
            }
            if($reponse['IdParagrapheEntrant'] == null){
                $ajouterParagrapheEntrant = $bdd->prepare("UPDATE reponse SET IdParagrapheEntrant = ? WHERE Id = ?");
                $ajouterParagrapheEntrant->execute([$paragraphe[$j], $reponseId]);
            }else{
                $ajouterParagrapheEntrant = $bdd->prepare("INSERT INTO reponse  (Description, IdParagrapheEntrant, IdParagrapheSortant) values (?,?,?)");
                $ajouterParagrapheEntrant->execute([ $reponseSortante[$i], $paragraphe[$j], $reponse['IdParagrapheSortant'] ]);
            }
        }
    }
}