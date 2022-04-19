<?php

if (isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['login']) && isset($_GET['password']) && isset($_GET['email'])) {
    $name=$_GET['nom'];
    $firstname=$_GET['prenom'];
    $login = $_GET['login'];
    $password = $_GET['password'];
    $mail = $_GET['email'];
    
    include "connectBDD.php";
    
    $sql = "INSERT INTO joueur(Nom, Prénom, NomUtilisateur, Mdp, Email) VALUES (?,?,?,?,?)";
    $query = $pdo->prepare($sql);
    
    // vérifier si la requête d'insertion a réussi
    if($query->execute([$name, $firstname,$login, $password, $mail])) {
        echo 'Bienvenue ' .  $login . ', votre inscription est validée';
      } else {
        var_dump($query->errorInfo());
        echo 'Échec de l\'opération d\'insertion';
    }
}

?>