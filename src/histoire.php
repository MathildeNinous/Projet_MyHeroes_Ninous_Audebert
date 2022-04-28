<?php
    require_once '../includes/head.php';
    $maRequete = $bdd->prepare("SELECT * FROM histoire  WHERE Id=?");
    $maRequete->execute([$_GET['id']]);
        $ligne = $maRequete->fetch();
    $mesParagraphes = $bdd->prepare("SELECT * FROM paragraphe  WHERE IdHistoire=? AND First = ?");
    $mesParagraphes->execute([$_GET['id'],TRUE]);//TODO changer pour que le premier dépende de l'avancement du joueur
        $paragraphe = $mesParagraphes->fetch();
?>

<body>
    <div class="container">
        <p><?php echo($ligne['Description']); ?></p>
        <p><a class="reponse" href="paragraphe.php?id=<?=$paragraphe['Id']?>">Jouer</a></p>
    </div>

</body>
