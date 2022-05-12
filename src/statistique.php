<?php 
    require_once '../includes/head.php';

    $statGlobales = $bdd->prepare("SELECT count(IdHistoire) AS nbPartie FROM histoireDeJoueur ");
    $statGlobales->execute();
    $stat = $statGlobales->fetch();

    $statMort = $bdd->prepare("SELECT count(*) AS nombreDeMort FROM histoireDeJoueur WHERE Mort = 1 ");
    $statMort->execute();
    $mort = $statMort->fetch();
    ?>

<body style="background-color:#A9A9A9">
    <div class = "container">
        <div class="row justify-content-center ">
            <div class="card col-sm-2" style="width: 50%;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Statistiques Globales</li>
                        <li class="list-group-item row">
                            <ul class="col-sm-12">
                                <li class="card "><p>Nombre de partie joué</p></li>
                                <li class="card "><p><?=$stat['nbPartie']?></p></li>
                                <li class="card col"><p>Nombre de mort</p></li>
                                <li class="card col"><p><?=$mort['nombreDeMort']?></p></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <?php

    $histoiredeJoueur = $bdd->prepare("SELECT *,count(IdHistoire) as nbPartie from histoireDeJoueur GROUP BY IdHistoire ");
    $histoiredeJoueur->execute([]);
    while($mesHistoires = $histoiredeJoueur->fetch()){
        $histoires = $bdd->prepare("SELECT * from histoire WHERE Id = ?");
        $histoires->execute([$mesHistoires['IdHistoire']]);
        $histoire = $histoires->fetch();
        
        
        $mort = $bdd->prepare("SELECT COUNT(Mort) as mort FROM histoireDeJoueur WHERE IdHistoire = ? AND IdJoueur = ? AND Mort = 1");
        $mort->execute([$histoire['Id'], $_SESSION['idUtilisateur']]);
        $morts= $mort->fetch();
?>
        <div class="row justify-content-center ">
            <div class="card col-sm-2" style="width: 50%;">
                <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?=$histoire['Titre']?></li>
                        <li class="list-group-item"><?=$histoire['Description']?></li>
                        <li class="list-group-item">
                            <ul class="col">
                                <li class="card"><p>Nombre de partie jouée</p></li>
                                <li class="card"><p><?=$mesHistoires['nbPartie']?></p></li>
                                <li class="card"><p>Nombre de mort</p></li>
                                <li class="card"><p><?=$morts['mort']?></p></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
    }
?>

</body>

<script src="../js/test.js"></script>