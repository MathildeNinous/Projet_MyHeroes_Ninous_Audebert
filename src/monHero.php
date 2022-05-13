<?php 
    require_once '../includes/head.php';
    include 'afficherHistoire.php';

    $histoiredeJoueur = $bdd->prepare("SELECT *, count(IdHistoire) as nbPartie from histoireDeJoueur WHERE IdJoueur = ? GROUP BY IdHistoire ");
    $histoiredeJoueur->execute([$_SESSION['idUtilisateur']]);
    while($mesHistoires = $histoiredeJoueur->fetch()){
        $histoires = $bdd->prepare("SELECT * from histoire WHERE Id = ?");
        $histoires->execute([$mesHistoires['IdHistoire']]);
        $histoire = $histoires->fetch();
        
        $mort = $bdd->prepare("SELECT COUNT(Mort) as mort FROM histoireDeJoueur WHERE IdHistoire = ? AND IdJoueur = ? AND Mort = 1");
        $mort->execute([$histoire['Id'], $_SESSION['idUtilisateur']]);
        $morts= $mort->fetch();
?>
    <body style="background-color:#A9A9A9">

        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="card col-sm-2" style="width:50%;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b><?=$histoire['Titre']?></b></li>
                        <li class="list-group-item"><i><?=$histoire['Description']?></i></li>
                        <li class="list-group-item row">
                            <ul class="row">
                                <li class="card col-sm-4"><p>Nombre de partie jouée <?=$mesHistoires['nbPartie']?></p></li>
                                <li class="card col-sm-4"><p>Nombre de mort <?=$morts['mort']?></p></li>
                                <li class="col-sm-4"><button class="btn btn-primary" onclick="MesHistoires(<?=$histoire['Id']?>)">Détail</button></li>
                            </ul>
                        </li>    
                        <?php $partie = $bdd->prepare("SELECT * from histoireDeJoueur WHERE IdJoueur = ? AND IdHistoire = ? ORDER BY Creation ");
                            $partie->execute([$_SESSION['idUtilisateur'], $histoire['Id']]);
                            while($maPartie = $partie->fetch()){
                        ?>
                        <li class="list-group-item row justify-content-between afficheHistoire histoire<?=$histoire['Id']?>">
                            <div class="row justify-content-between" >
                                <p class="col-sm-4"><?=$maPartie['Creation']?></p>
                                <p class="col-sm-4">Nombre de points : <?=$maPartie['Souplesse']+$maPartie['Puissance']?></p>
                                <p class="col-sm-4"><button class="btn btn-secondary" onclick="RecapHistoire(<?=$maPartie['Id']?>)">Voir</button></p>
                            </div>
                        </li>
                        <li class="list-group-item recap recap<?=$maPartie['Id'] ?>"><?=affichageHistoireFinie($bdd,$maPartie['Id'],$histoire['Id'])?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php
    }

?>

</body>

<script src="../js/test.js"></script>