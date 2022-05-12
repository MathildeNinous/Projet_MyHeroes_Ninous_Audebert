<?php
    require_once '../includes/head.php';

function affichageHistoireFinie($bdd,$histoireDeJoueur, $monHistoire){
    ?>
    <div class="description"><?=nl2br($monHistoire) ?></div>
    <?php
    $histoire = $bdd->prepare("SELECT * from avancement WHERE HistoireDeJoueur = ? ORDER BY Ordre");
    $histoire->execute([$histoireDeJoueur]);
    while($histoireFinale = $histoire->fetch()){
        $paragraphe= $bdd->prepare("SELECT Description FROM paragraphe WHERE Id = ?");
        $paragraphe->execute([$histoireFinale['Paragraphe']]);
        $descriptionParagraphe = $paragraphe->fetch(); ?>
        <div class="description"><p><?=nl2br($descriptionParagraphe['Description']) ?></p>
        <?php 
         $choix= $bdd->prepare("SELECT Description from reponse WHERE IdParagrapheEntrant = ?");
         $choix->execute([$histoireFinale['Paragraphe']]);
         $descriptionChoix = $choix->fetch();
         ?> 
        <p><?php if($descriptionChoix){echo nl2br($descriptionChoix[0]);} ?></p></div>
        <?php
    }
}

function erreur(){
        header("Location: ../includes/erreur.php");
}

if(!isset($_GET['titre'])){
    erreur();
}
    //on récupère les informations de l'histoire choisie
    $maRequete = $bdd->prepare("SELECT * FROM histoire  WHERE Titre=?");
    $maRequete->execute([$_GET['titre']]);
    $histoire = $maRequete->fetch();
    if($maRequete->rowCount() == 0){
        erreur();
    }  
    //On regarde si le joeur à déjà commencé cette histoire
    $monCompte = $bdd->prepare("SELECT * FROM histoiredejoueur  WHERE IdHistoire=? AND IdJoueur = ? AND Mort = ?");
    $monCompte->execute([$histoire['Id'],$_SESSION['idUtilisateur'], 0]);
    $compte = $monCompte->fetch();
    if(!$compte || $compte['Mort'] != 0 || $compte['Finie'] != 0){
        //On crée la partie et récupère les informations de la partie
        $creerCompte = $bdd->prepare("INSERT INTO histoiredejoueur  (IdHistoire, IdJoueur, Avancement, Creation) VALUES (?,?,?,?)");
        $creerCompte->execute([$histoire['Id'],$_SESSION['idUtilisateur'], $histoire['PremierParagraphe'],time()]);
        
        $monCompte = $bdd->prepare("SELECT * FROM histoiredejoueur  WHERE IdHistoire=? AND IdJoueur = ? AND Mort = ?");
        $monCompte->execute([$histoire['Id'],$_SESSION['idUtilisateur'], 0]);
        $compte = $monCompte->fetch();
        $idParagraphe = $histoire['PremierParagraphe'];

        //On enregistre l'avencement du joueur
        $monAvancement = $bdd->prepare("INSERT INTO avancement (HistoireDeJoueur, Ordre, Paragraphe) VALUES (?,?,?)");
        $monAvancement->execute([$compte['Id'],'0',$idParagraphe]);
    }else{
        if(!isset($_GET['id'])){
            header('Location: paragraphe.php?id='.$compte['Avancement'].'&titre='.$histoire['Titre']);
        }else{
            //test du get
            $testParagraphes = $bdd->prepare("SELECT * FROM paragraphe  WHERE Id = ?");
            $testParagraphes->execute([$_GET['id']]);
            $testParagraphe = $testParagraphes->fetch();
            if($testParagraphes->rowCount()==0){
                erreur();
            }
                $creerCompte = $bdd->prepare("UPDATE histoiredejoueur set Avancement=? where Id=?");
                $creerCompte->execute([$_GET['id'],$compte['Id']]);
                $idParagraphe = $_GET['id'];
            }

            //On récupère le nombre de paragraphe qu'on à déjà joué
            $avancement = $bdd->prepare("SELECT Paragraphe,Ordre from avancement WHERE Ordre = (SELECT MAX(Ordre) FROM avancement WHERE HistoireDeJoueur = ?)");
            $avancement->execute([$compte['Id']]);
            $ordre = $avancement->fetch();

            //On enregistre l'avencement du joueur
            if($ordre['Paragraphe'] != $_GET['id']){
            $monAvancement = $bdd->prepare("INSERT INTO avancement (HistoireDeJoueur, Ordre, Paragraphe) VALUES (?,?,?)");
            $monAvancement->execute([$compte['Id'],$ordre['Ordre']+=1,$idParagraphe]);
        }
    }


    //On vérifie que le hero n'est pas mort
    if($compte['Deshydratation']+$compte['Fatigue'] <= -10 && $idParagraphe != $histoire['ParagrapheMort']){
    header('Location: paragraphe.php?id='.$histoire['ParagrapheMort'].'&titre='.$histoire['Titre']);}
    //On cherche le paragraphe    
    $mesParagraphes = $bdd->prepare("SELECT * FROM paragraphe  WHERE Id = ?");
    //on récupère la capacité du paragraphe
    $mesParagraphes->execute([$idParagraphe]);
    $paragraphe = $mesParagraphes->fetch();

    $capacites = $bdd->prepare("SELECT * FROM capacite  WHERE Id = ?");
    $capacites->execute([$paragraphe['Capacite']]);
    $capacite = $capacites->fetch();

    $capaciteNom = $capacite['Nom'];
    $nouvelleCapacite = $compte[$capaciteNom]+$capacite['NbPoint'];

    //On modifie la capacité du joueur dans cette histoire
    $changerCapacite = $bdd->prepare("UPDATE histoiredejoueur set $capaciteNom=? where Id=?");
    $changerCapacite->execute([$nouvelleCapacite,$compte['Id']]);
?>

<body>
    <div class="titre">
       <svg xmlns="http://www.w3.org/2000/svg" width="20%" height="20%" fill="#FFFFF" class="bi bi-book-half" viewBox="0 0 16 16">
        <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
        </svg>
        <h1><?= $_GET['titre'] ?></h1>
    </div>
    <div class="container paragraphe">
        <p class="description"><?php echo(nl2br($paragraphe['Description'])); ?></p>
        <div class="row">
            <?php 
                $mesChoix = $bdd->prepare("SELECT * FROM reponse  WHERE IdParagrapheEntrant=?");
                $mesChoix->execute([$paragraphe['Id']]);
                while($choix = $mesChoix->fetch()){?>
                <a class="choix" href="paragraphe.php?id=<?=$choix['IdParagrapheSortant']?>&titre=<?=$histoire['Titre']?>">
                    <div class="col-12 infoClick" style="width : 100%">
                        <p class="row"><?= $choix['Description']?></p>
                    </div>
                </a>
                <?php }?>
                <?php 
                //On regarde si le paragraphe est le paragraphe de mort
                if($idParagraphe == $histoire['ParagrapheMort']){
                    $mort = $bdd->prepare("UPDATE histoireDeJoueur SET Mort = ? WHERE Id = ?");
                    $mort->execute([1,$compte['Id']]);
                ?> 
                    <p class="description" style = "background-color:#C70039; color:white;">Malheureusement tu es morts avant d'aller au bout de l'aventure</p>
                <?php
                affichageHistoireFinie($bdd,$compte['Id'],$histoire['Description']);
                }else{
                    //On regarde si le paragraphe est un paragraphe de fin
                 if($mesChoix->rowCount() == 0){ 
                     $finie = $bdd->prepare("UPDATE histoiredejoueur set Finie = ? WHERE Id = ?");
                     $finie->execute([1,$compte['Id']]);
                     ?>
                    <div class = "infoClick" style="width : 100%">
                    <p>Félicitation vous êtes allé au bout de cette histoire !</p>
                    <?php affichageHistoireFinie($bdd,$compte['Id'],$histoire['Description']); ?> 
                </div>
                <?php ;}}?>
        </div>
    </div>
    <?php 
    $heroCapacites = $bdd->prepare("SELECT * FROM capacite");
    $heroCapacites->execute();
    ?>
    <div class="d-flex justify-content-around row">
    <?php
    while($heroCapacite = $heroCapacites->fetch()){
        $nom = $heroCapacite['Nom'];
        $nbPoint = $bdd->prepare("SELECT * FROM histoiredejoueur where Id=? ");
        $nbPoint->execute([$compte['Id']]);
        $point = $nbPoint->fetch();?>
        <div class="capacite card col-sm-2" style="width:20%; <?php if($point[$nom] <= -10){ ?> background-color:#C70039; color:white; <?php } ?>" >
            <div class="card-body">
                <h5 class="card-title"><?=$heroCapacite['Nom']?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Nombre de point</h6>
                <p class="card-text"><?=$point[$nom]?></p>
            </div>
            </div>
            <?php } ?>
</body>