<?php
session_start();
include("../includes/connectBDD.php");

//TRAITEMENT
if (!empty($_POST['nomUtilisateur']) and !empty($_POST['mdp'])) {
    $nomUtilisateur = $_POST['nomUtilisateur'];
    $mdp = $_POST['mdp'];

    if($bdd) {
        $sql='SELECT * FROM joueur WHERE NomUtilisateur=?';
        $reponse=$bdd->prepare($sql);
        $reponse->execute([$nomUtilisateur]);

        if ($ligne=$reponse->fetch()){
             // Authentication succes
            if ($ligne["NomUtilisateur"]==$nomUtilisateur) {
                $verify = password_verify($mdp,$ligne['Mdp']);
                if($verify){
                    $_SESSION['nomUtilisateur'] = $nomUtilisateur;
                    $_SESSION['idUtilisateur'] = $ligne['Id'];
                    header('Location:../src/index.php');
                }
                else{
                    echo "Mot de passe incorrect";
                }
            }
        }else {
            echo "Utilisateur non reconnu";
        }
    }
}
?>
