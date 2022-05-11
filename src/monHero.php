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
        <div class="container ">
            <div class="row justify-content-center ">
                <div class="card col-sm-2" style="width: 50%;">
                    <ul class="list-group list-group-flush ">
                        <li class="list-group-item"><?=$histoire['Titre']?></li>
                        <li class="list-group-item"><?=$histoire['Description']?></li>
                        <li class="list-group-item row">
                            <ul class="col-sm-12">
                                <li class="card "><p>Nombre de partie jouée </p></li>
                                <li class="card "><p><?=$mesHistoires['nbPartie']?></p></li>
                                <li class="card "><p>Nombre de mort</p></li>
                                <li class="card "><p><?=$morts['mort']?></p></li>
                                <button class="btn btn-primary" onclick="MesHistoires(<?=$histoire['Id']?>)">Détail</button>
                            </ul>
                        </li>    
                        <?php $partie = $bdd->prepare("SELECT * from histoireDeJoueur WHERE IdJoueur = ? AND IdHistoire = ? ORDER BY Creation ");
                            $partie->execute([$_SESSION['idUtilisateur'], $histoire['Id']]);
                            while($maPartie = $partie->fetch()){
                        ?>
                        <li class="list-group-item row justify-content-between afficheHistoire histoire<?=$histoire['Id']?>">
                            <div class="row justify-content-between" >
                                <p class="col-sm-6"><?=$maPartie['Creation']?></p>
                                <p class="col-sm-6"><button class="btn btn-secondary" onclick="RecapHistoire(<?=$maPartie['Id']?>)">Voir</button></p>
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

<script src="../js/test.js"></script>