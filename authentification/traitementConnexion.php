<?php
session_start();
include("includes/connectBDD.php");

//TRAITEMENT
if (!empty($_POST['nomUtilisateur']) and !empty($_POST['mdp'])) {
    $nomUtilisateur = $_POST['nomUtilisateur'];
    $mdp = $_POST['mdp'];

    if($bdd) {
        $sql='SELECT * FROM joueur WHERE NomUtilisateur=? AND Mdp=?';
        $reponse=$bdd->prepare($sql);
        $reponse->execute([$nomUtilisateur, $mdp]);

        if ($ligne=$reponse->fetch()){
             // Authentication succes
            if ($ligne["NomUtilisateur"]==$nomUtilisateur && $ligne["Mdp"]==$mdp) {
                $_SESSION['nomUtilisateur'] = $nomUtilisateur;
                echo("t'es connecté bg");
                header('Location: includes/index.php');
            }
        }else {
            echo "Utilisateur non reconnu";
        }
    }
}
?>
