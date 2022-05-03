<?php
    //on récupère les informations de l'histoire choisie
    $maRequete = $bdd->prepare("SELECT * FROM histoire  WHERE Id=?");
    $maRequete->execute([$_GET['id']]);
        $ligne = $maRequete->fetch();

    $monCompte = $bdd->prepare("SELECT * FROM histoiredejoueur  WHERE IdHistoire=? AND IdJoueur = ?");
    $monCompte->execute([$_GET['id'],$_SESSION['nomUtilisateur']]]);
    $histoire = $monCompte->fetch();

    if(isset($histoire['Avancement'])){
        $idParagraphe = $histoire['Avancement'];
        
    }else{
        echo "caca";
        $idParagraphe = $ligne['PremierParagraphe'];
        $paragrapheEnCours = $bdd->prepare("UPDATE histoiredejoueur SET avancement=?");
        $paragrapheEnCours->execute([$ligne['PremierParagraphe']]);
    }

    //On cherche le paragraphe
    $mesParagraphes = $bdd->prepare("SELECT * FROM paragraphe  WHERE IdHistoire=? AND Id = ?");
    $mesParagraphes->execute([$_GET['id'],$idParagraphe]);
        $paragraphe = $mesParagraphes->fetch();
?>