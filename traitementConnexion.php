<?php
include("connectBDD.php");

//TRAITEMENT
if (!empty($_POST['login']) and !empty($_POST['password'])) {
    $nomUtilisateur = $_POST['login'];
    $mdp = $_POST['password'];

    if($BDD) {
        $sql='SELECT * FROM joueur WHERE NomUtilisateur=? AND Mdp=?';
        $query=$pdo->prepare($sql);
        $query->execute([$nomUtilisateur, $mdp]);
    
        if ($row=$query->fetch()){
            if ($ligne["NomUtilisateur"]==$nomUtilisateur && $ligne["Mdp"]==$mdp) {
                session_start();
                $_SESSION['login'] = $nomUtilisateur;
                header('Location: pagePrivee.php');
            }
        }
        else {
            header('Location: authentification.php');
        }

        //brouillon
        $response = $BDD->query($maRequete);
        while($ligne = $response->fetch()) {
            if ($ligne["NomUtilisateur"]==$nomUtilisateur && $ligne["Mdp"]==$mdp)
            {
                // Authentication succes
                $_SESSION['login'] = $nomUtilisateur;
                header('Location: index.php');
            } else {
                $error = "Utilisateur non reconnu";
            }
        }
    }


    if($BDD) {
        //voir si on peut faire une reqête préparée
        $maRequete = "SELECT * FROM joueur";
    
        // On exécute la requête en lui fournissant les variables à utiliser dans l’ordre
        $response = $BDD->query($maRequete);
        while($ligne = $response->fetch()) {
            if ($ligne["NomUtilisateur"]==$nomUtilisateur && $ligne["Mdp"]==$mdp)
            {
                // Authentication succes
                $_SESSION['login'] = $nomUtilisateur;
                header('Location: index.php');
            } else {
                $error = "Utilisateur non reconnu";
            }
        }
    }
}
?>






<?php
include "../connexionBD.php";

$email = $_GET['email'];
$password = $_GET['password'];
if(isset($_GET['email']) && isset($_GET['password'])) {
    $sql='SELECT * FROM user WHERE email=? AND password=?';
    $query=$pdo->prepare($sql);
    $query->execute([$email, $password]);
    
    if ($row=$query->fetch()){
        session_start();
        $_SESSION["nom"]=$row['name'];
        $_SESSION["id"]=$row['id'];
        header('Location: pagePrivee.php');
    }
    else {
        header('Location: authentification.php');
    }
}

?>