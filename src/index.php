<?php 
    require_once '../includes/head.php';
    include '../includes/modalError.php';
    include '../includes/modalHistoire.php';
    ?>
<body>
    <div class="container">
        <div class = "row justify-content-center">
                <?php 
                    $maRequete = "SELECT * FROM histoire";
                    $response = $bdd->query($maRequete);
                    while($ligne = $response->fetch()){
                if (!empty($_SESSION['nomUtilisateur'])){?> 

                <button type="button" class="histoire col-sm-4 btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="afficherHistoire('<?=$ligne['Titre']?>','<?=$ligne['Description']?>','<?=$ligne['Id']?>');">

                    <?php } else {?>
                        
                <button type="button" class="histoire col-sm-4 btn btn-primary" data-toggle="modal" data-target="#modalError" onclick="erreurConnexion()" >
                    <?php } ?>

                   <?php echo($ligne['Titre'])?>
                </button>
                <?php } ?>
        </div>
    </body>
    <script src="../js/test.js"></script>
</html>