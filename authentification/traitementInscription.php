<?php
session_start();
include("../includes/connectBDD.php");

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['nomUtilisateur']) && isset($_POST['mdp']) && isset($_POST['mdpConfirmed']) && isset($_POST['email'])) {
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $nomUtilisateur = $_POST['nomUtilisateur'];
    $mdp = $_POST['mdp'];
    $mdpConfirme = $_POST['mdpConfirmed'];
    $email = $_POST['email'];
    $hash = crypt($mdp,PASSWORD_BCRYPT);

    $maRequete = "SELECT NomUtilisateur FROM joueur";
    $resultat = $bdd->query($maRequete);
    while ($ligne = $resultat->fetch())
    {
        if($ligne['NomUtilisateur'] == $nomUtilisateur){
            $error="Identifiant déjà utilisé. Veuillez changer d'identifiant";
        }
    }
    if($mdp != $mdpConfirme){
        $error="Mauvaise saisie du mot de passe";
    }

    
    $sql = "INSERT INTO joueur(Nom, Prénom, NomUtilisateur, Mdp, Email) VALUES (?,?,?,?,?)";
    $query = $bdd->prepare($sql);
    
    // vérifier si la requête d'insertion a réussi
    if($query->execute([$nom, $prenom, $nomUtilisateur, $hash, $email])) {
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