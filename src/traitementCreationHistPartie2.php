<?php
    include("../includes/connectBDD.php");

//TRAITEMENT DONNEES DEUXIEME PARTIE DU FORMULAIRE
$reponseSortante = $_POST['reponseSortante'];



for($j=0; $j<count($reponseSortante); $j++) {
    ?>
    <h1><?=$reponseSortante[$j]?></h1>
    <?php

    if (!empty($reponseSortante[$j])) {
    //on insert les réponses
    $sql3 = "INSERT INTO reponse(Description, IdParagrapheEntrant, IdParagrapheSortant) VALUES (?,?,?)";
    $query3 = $bdd->prepare($sql3);
    $query3->execute([$_POST['reponse'], $reponseSortante[$j], $_POST['paragraphe']]);
    }
}