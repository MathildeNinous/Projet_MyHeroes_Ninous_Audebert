<?php
session_start();
include("../includes/connectBDD.php");

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
                $_SESSION['idUtilisateur'] = $ligne['Id'];
                if($ligne['Droit'] == 1){
                    $_SESSION['Droit'] = 'admin';
                }
                echo("t'es connecté bg".$_SESSION['idUtilisateur']);
                header('Location: ../src/index.php');
            }
        }else {
            echo "Utilisateur non reconnu";
        }
    }
}
?>
