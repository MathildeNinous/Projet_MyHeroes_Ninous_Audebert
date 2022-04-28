<?php
    require_once '../includes/head.php';
    $maRequete = $bdd->prepare("SELECT * FROM paragraphe  WHERE Id=?");
    $maRequete->execute([$_GET['id']]);
        $ligne = $maRequete->fetch();
?>

<body>
</div>
    <div class="container">
        <p class="paragraphe"><?php echo($ligne['Description']); ?></p>
        <div class="row">
        <?php 
            $mesChoix = $bdd->prepare("SELECT * FROM reponse  WHERE IdParagrapheEntrant=?");
            $mesChoix->execute([$ligne['Id']]);
            while($choix = $mesChoix->fetch()){
        ?>
        <a class="choix" href="paragraphe.php?id=<?=$choix['IdParagrapheSortant']?>">
        <div class="card infoClick">
            <p class="col-3"><?php echo $choix['Description']?></p>
        </div>
    </a>
        <?php } ?>
        </div>

    </div>

</body>
