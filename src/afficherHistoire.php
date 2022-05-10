<?php function affichageHistoireFinie($bdd,$histoireDeJoueur, $monHistoire){
    ?>
    <div class="description"><?=nl2br($monHistoire) ?></div>
    <?php

    $histoire = $bdd->prepare("SELECT * from avancement WHERE HistoireDeJoueur = ? ORDER BY Ordre");
    $histoire->execute([$histoireDeJoueur]);
    while($histoireFinale = $histoire->fetch()){
        $paragraphe= $bdd->prepare("SELECT description FROM paragraphe WHERE Id = ?");
        $paragraphe->execute([$histoireFinale['Paragraphe']]);
        $descriptionParagraphe = $paragraphe->fetch(); ?>
        <div class="description"><p><?=nl2br($descriptionParagraphe[0]) ?></p>
        <?php 
         $choix= $bdd->prepare("SELECT Description from reponse WHERE IdParagrapheEntrant = ?");
         $choix->execute([$histoireFinale['Paragraphe']]);
         $descriptionChoix = $choix->fetch();
         ?> 
        <p><?php if($descriptionChoix){echo nl2br($descriptionChoix[0]);} ?></p></div>
        <?php
    }
}
