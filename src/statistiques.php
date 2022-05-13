<?php 
    require_once '../includes/head.php';
    include '../includes/modalHide.php';
    include '../includes/modalDelete.php';
    include '../includes/modalVisible.php';

    $toutesLesHistoires=$bdd->prepare("SELECT count(*) as nbPartie FROM histoiredejoueur");
    $toutesLesHistoires->execute();
    $lesHistoires= $toutesLesHistoires->fetch();

    $toutesLesMorts=$bdd->prepare("SELECT count(*) as nbMort FROM histoiredejoueur WHERE Mort = ?");
    $toutesLesMorts->execute([1]);
    $nbMort=$toutesLesMorts->fetch();
    ?> 
<body style="background-color:#A9A9A9">
    <div class="container">
            <div class="row justify-content-center ">
                <div class="card col-sm-2 mt-4" style="width: 50%;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item display-6"><b>STATISTIQUES GLOBALES</b></li>
                        <li class="list-group-item row">
                            <ul class="col-sm-12">
                                <li class="card rounded"><p>↓ Nombre de parties jouées ↓</p></li>
                                <li class="card rounded"><p><?=$lesHistoires['nbPartie']?></p></li>
                                <li class="card rounded"><p>↓ Nombre de morts ↓</p></li>
                                <li class="card rounded"><p><?=$nbMort['nbMort']?></p></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    
    <?php
    $histoire = $bdd->prepare("SELECT *, count(Id) as nbHistoire from histoire GROUP BY Id");
    $histoire->execute();
    while($mesHistoires = $histoire->fetch()){
        $histoiredeJoueurs = $bdd->prepare("SELECT *, count(IdHistoire) as nbPartie from histoireDeJoueur WHERE IdHistoire = ? GROUP BY IdHistoire ");
        $histoiredeJoueurs->execute([$mesHistoires['Id']]);
        $histoiredeJoueur = $histoiredeJoueurs->fetch();
        
        $mort = $bdd->prepare("SELECT COUNT(Mort) as mort FROM histoireDeJoueur WHERE IdHistoire = ? AND Mort = ?");
        $mort->execute([$mesHistoires['Id'],1]);
        $morts= $mort->fetch();
        ?>
        <div class="container">
            <div class="row justify-content-center ">
                <div class="card col-sm-2 pt-2" style="width: 50%; background-color: #A2D9CE;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="background-color:#DCDCDC;"><b><?=$mesHistoires['Titre']?></b></li>
                        <li class="list-group-item" style="background-color:#DCDCDC;"><i><?=$mesHistoires['Description']?></i></li>
                        <li class="list-group-item row" style="background-color: #A2D9CE">
                            <button type="button" class="btn voirStatistique" style="background-color:#77B5FE;" onclick="statistique(<?=$mesHistoires['Id']?>)">Statistiques</button>
                            <ul class="col-sm-12 statistique statistique<?=$mesHistoires['Id']?> pt-2 pb-2" style="background-color:#77B5FE;">
                                <li class="card rounded" style="background-color:#77B5FE;"><p>Nombre de parties jouées </p></li>
                                <li class="card rounded"><p><?php if(isset($histoiredeJoueur['nbPartie'])){echo $histoiredeJoueur['nbPartie'];}else{echo 0;}?></p></li>
                                <li class="card rounded"><p>Nombre de morts</p></li>
                                <li class="card rounded"><p><?=$morts['mort']?></p></li>
                            </ul> 
                            </li>   
                            <?php if($mesHistoires['Cacher'] == 0){?>
                                <li class="list-group-item" style="background-color: #A2D9CE">
                                <button type="button" class="btn idHistoireCacher" style="background-color:#DCDCDC;" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalHide" onclick="suppression(<?=$mesHistoires['Id']?>)">Cacher</button>
                                <?php }else{ ?>
                                    <button type="button" class="btn btn-light idHistoireCacher" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalVisible" onclick="suppression(<?=$mesHistoires['Id']?>)">Visible</button>
                                    <?php } ?>
                                <button type="button" class="btn btn-danger idHistoire" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalDelete" onclick="suppression(<?=$mesHistoires['Id']?>)">Supprimer</button>
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