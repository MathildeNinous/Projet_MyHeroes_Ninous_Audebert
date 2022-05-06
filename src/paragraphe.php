<?php
    require_once '../includes/head.php';
    //on récupère les informations de l'histoire choisie
    $maRequete = $bdd->prepare("SELECT * FROM histoire  WHERE Titre=?");
    $maRequete->execute([$_GET['titre']]);
        $histoire = $maRequete->fetch();

    //On regarde si le joeur à déjà commencé cette histoire
    $monCompte = $bdd->prepare("SELECT * FROM histoiredejoueur  WHERE IdHistoire=? AND IdJoueur = ?");
    $monCompte->execute([$histoire['Id'],$_SESSION['idUtilisateur']]);
    $compte = $monCompte->fetch();
    if(!$compte){
        $creerCompte = $bdd->prepare("INSERT INTO histoiredejoueur  (IdHistoire, IdJoueur, Avancement) VALUES (?,?,?)");
        $creerCompte->execute([$histoire['Id'],$_SESSION['idUtilisateur'], $histoire['PremierParagraphe']]);
        $compte = $creerCompte->fetch();
        $idParagraphe = $histoire['PremierParagraphe'];
    }else{
        if(!isset($_GET['id'])){
            header('Location: paragraphe.php?id='.$compte['Avancement'].'&titre='.$histoire['Titre']);
        }else{
            $creerCompte = $bdd->prepare("UPDATE histoiredejoueur set Avancement=? where Id=?");
            $creerCompte->execute([$_GET['id'],$compte['Id']]);
            $idParagraphe = $_GET['id'];
        }
        
    }

    //On cherche le paragraphe    
    $mesParagraphes = $bdd->prepare("SELECT * FROM paragraphe  WHERE Id = ?");
    $mesParagraphes->execute([$idParagraphe]);
    $paragraphe = $mesParagraphes->fetch();
    //on récupère la capacité du paragraphe
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
        <h1><?php echo $_GET['titre'] ?></h1>
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
                        <p class="row"><?php echo $choix['Description']?></p>
                    </div>
                </a>
                <?php }?>
                <?php if($mesChoix->rowCount() == 0){?>
                    <div class = "infoClick" style="width : 100%">
                    <p class="description">Félicitation vous êtes allé au bout de cette histoire !</p>
                    <p><?=$histoire['Description']?></p>
                </div>
                <?php ;}
            $avancementHistoire = $bdd->prepare("UPDATE histoire set Description = ? where Id=?");
            //$avancementHistoire->execute([$histoire['Description']."\n".$choix['Description']."\n".$paragraphe['Description'],$histoire['Id']]);
            $avancementHistoire->execute([$histoire['Description'],$compte['Id']]);?>
        
                    
        </div>
    </div>


</body>