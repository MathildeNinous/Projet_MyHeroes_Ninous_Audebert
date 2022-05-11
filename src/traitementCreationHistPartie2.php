<?php
    include("../includes/connectBDD.php");

    $reponseSortante = $_POST['reponseSortante'];
    $paragraphe= $_POST['idParagraphe'];

for($j=0; $j<count($paragraphe); $j++) {
    for($i=$j*2; $i<=($j*2+count($paragraphe)-1); $i++){
        $reponseRequete = $bdd->prepare("SELECT * from reponse where description = ?");
        $reponseRequete->execute([$reponseSortante[$i]]);
        $reponse = $reponseRequete->fetch();
        
        if($reponse['IdParagrapheEntrant'] == null){
            $ajouterParagrapheEntrant = $bdd->prepare("UPDATE reponse SET IdParagrapheEntrant = ? WHERE Id = ?");
            $ajouterParagrapheEntrant->execute([$paragraphe[$j], $reponse['Id']]);
        }else{
            $ajouterParagrapheEntrant = $bdd->prepare("INSERT INTO reponse  (Description, IdParagrapheEntrant, IdParagrapheSortant) values (?,?,?)");
            $ajouterParagrapheEntrant->execute([ $reponseSortante[$i], $paragraphe[$j], $reponse['IdParagrapheSortant'] ]);
        }
    }
}

?>

<style>
    body{ background-image: url("../images/bibli.jpg");
          color:black;
          font-size: 1.3em;
        }
    div {
        display: flex;
        margin-right:auto;
        margin-left: auto;
        margin-top: 5em;;
        justify-content: center;
        width: 40%;
        flex-direction: column;
        background-color: #f7f1e9;
        padding:0.3em;
        border-radius: 20%;
        text-align: center;
    }
</style>

<div>
    <h1>HISTOIRE CRÉÉE !</h1>
    <p>
        Vous avez créée votre histoire avec succès, félicitations.<br>
        Reviens vite sur la page d'accueil en cliquant juste ici ↓
    </p>
    <a class="btn btn-info" href="index.php">Retour à l'accueil</a>
</div>


