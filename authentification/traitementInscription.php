<?php
session_start();
include("../includes/connectBDD.php");

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['nomUtilisateur']) && isset($_POST['mdp']) && isset($_POST['email'])) {
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $nomUtilisateur = $_POST['nomUtilisateur'];
    $mdp = $_POST['mdp'];
    $email = $_POST['email'];
    
    $sql = "INSERT INTO joueur(Nom, Prénom, NomUtilisateur, Mdp, Email) VALUES (?,?,?,?,?)";
    $query = $bdd->prepare($sql);
    

    // vérifier si la requête d'insertion a réussi
    if($query->execute([$nom, $prenom, $nomUtilisateur, $mdp, $email])) {
      echo 'Bienvenue ' .  $nomUtilisateur . ', votre inscription est validée';

      $_SESSION['nomUtilisateur'] = $nomUtilisateur;
      //TODO faire en sorte de mettre l'id utilisateur
      header("Location: ../src/index.php");
      Exit();


    } else {
      var_dump($query->errorInfo());
      echo 'Échec de l\'opération d\'insertion';
    }
}

?>