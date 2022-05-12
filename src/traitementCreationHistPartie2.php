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

?>

<style>
    body{ background-image: url("../images/livres.jpg");
        background-size: 100% auto;
          color:black;
          font-size: 1.3em;
          background-color:#A9A9A9;
          font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
    div {
        display: flex;
        margin-right:auto;
        margin-left: auto;
        margin-top: 5em;;
        justify-content: center;
        width: 40%;
        flex-direction: column;
        background-color: #A2D9CE;
        padding:0.3em;
        border-radius: 15%;
        text-align: center;
    }
    a {
        text-decoration: none;
        color: black;
        padding: 0.2em;
        border-radius: 40%;
        border : solid 2px blue;
        width: 40%;
        margin-right:auto;
        margin-left: auto;
        margin-bottom: 1.2em;
        background-color: #DEB887;
        border : solid 3px #DEB887
    }
</style>

<body>
    <div>
    <h2>HISTOIRE CRÉÉE !</h2>
    <p>
        Vous avez créée votre histoire avec succès, félicitations.<br>
        Reviens vite sur la page d'accueil en cliquant juste ici <br>↓
    </p>
    <a class="btn btn-info" href="index.php">Retour à l'accueil</a>
</div>

</body>

<script src="../lib/jquery/jquery.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>