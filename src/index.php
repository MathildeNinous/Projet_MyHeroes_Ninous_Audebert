<?php 
    require_once '../includes/head.php';
    include '../includes/modalHistoire.php';
    include '../includes/modalErrors.php';
    ?>
<body style="background-color:#A9A9A9">
    <div class="container">
        <div class="row justify-content-center">
                <?php 
                    $maRequete = "SELECT * FROM histoire";
                    $response = $bdd->query($maRequete);
                    while($ligne = $response->fetch()){
                if ($ligne['Cacher']==0){
                    if (!empty($_SESSION['nomUtilisateur'])){
                        $histoiredejoueur = $bdd->prepare("SELECT * from histoiredejoueur WHERE IdHistoire = ? AND  Mort = ? AND Finie = ?");
                        $histoiredejoueur->execute([$ligne['Id'], 0, 0]);
                        $histoire = $histoiredejoueur->fetch();
                        if($histoiredejoueur->rowCount() != 0){?>
                            <button type="button" class="histoireEnCours col-sm-4 btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#modalHistoire" onclick="afficherHistoire('<?=$ligne['Titre']?>','<?=$ligne['Description'] ?>','<?=$ligne['Id']?>')">
                        <?php
                            }else{
                        ?>
                        <button type="button" class="histoire col-sm-4 btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#modalHistoire" onclick="afficherHistoire('<?=$ligne['Titre']?>','<?=$ligne['Description'] ?>','<?=$ligne['Id']?>')">
        
                            <?php }
                        } else {?>
                                
                        <button type="button" class="histoire col-sm-4 btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#modalError">
                            <?php } ?>
                            <img src="../images/livre-ouvert.png" height ="80" width="100" />
                            <br>
                            <?=$ligne['Titre']?>
                        </button>
                        <?php
                    }
                } ?>
        </div>
    </body>
    <script src="../js/test.js"></script>
</html>