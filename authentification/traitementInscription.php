<?php
session_start();
include("../includes/connectBDD.php");

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['nomUtilisateur']) && isset($_POST['mdp']) && isset($_POST['email'])) {
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $nomUtilisateur = $_POST['nomUtilisateur'];
    $mdp = $_POST['mdp'];
    $email = $_POST['email'];
    if($email == "admin@behero.fr"){
      $droit = 1;
      $_SESSION['Droit'] = 'admin';
    }else{
      $droit = 0;
    }
    
    $sql = "INSERT INTO joueur(Nom, Prénom, NomUtilisateur, Mdp, Email, Droit) VALUES (?,?,?,?,?,?)";
    $query = $bdd->prepare($sql);
    

    // vérifier si la requête d'insertion a réussi
    if($query->execute([$nom, $prenom, $nomUtilisateur, $mdp, $email, $droit])) {
      echo 'Bienvenue ' .  $nomUtilisateur . ', votre inscription est validée';

      $_SESSION['nomUtilisateur'] = $nomUtilisateur;
      
      $monCompte = $bdd->prepare("SELECT * FROM joueur WHERE NomUtilisateur = ?");
      $monCompte->execute(array($_SESSION['nomUtilisateur']));
      $compte = $monCompte->fetch();
        $_SESSION['idUtilisateur']=$compte['Id'];
        header("Location: ../src/index.php");
      }

    } else {
      var_dump($query->errorInfo());
      echo 'Échec de l\'opération d\'insertion';
    
}

?>