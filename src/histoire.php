<?php
    require_once '../includes/head.php';

    //on récupère les informations de l'histoire choisie
    $maRequete = $bdd->prepare("SELECT * FROM histoire  WHERE Id=?");
    $maRequete->execute([$_GET['id']]);
        $ligne = $maRequete->fetch();

    //On cherche le paragraphe
    $mesParagraphes = $bdd->prepare("SELECT * FROM paragraphe  WHERE IdHistoire=? AND Id = ?");
    $mesParagraphes->execute([$_GET['id'],$ligne['PremierParagraphe']]);//TODO changer pour que le premier dépende de l'avancement du joueur
        $paragraphe = $mesParagraphes->fetch();
?>

<body style="background-color:#A9A9A9">
    <div class="container">
        <p><?=$ligne['Description']; ?></p>
        <p><a class="reponse" href="paragraphe.php?id=<?=$paragraphe['Id']?>&titre=<?=$ligne['Titre']?>">Jouer</a></p>
    </div>

</body>