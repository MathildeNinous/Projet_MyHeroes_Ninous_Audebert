<?php 
    require_once '../includes/head.php';?>
<body>
    <div class="container">
        <div class = "row justify-content-center">
                <?php 
                    $maRequete = "SELECT * FROM histoire";
                    $response = $bdd->query($maRequete);
                    while($ligne = $response->fetch()){
                ?>
                <a class = "myButton" href="../src/histoire.php?id=<?=$ligne['Id']?>">    
                    <div class="infoClick card col-sm-4">
                        <div class="card-body">
                            <h3 class="card-title text-center" ><?php echo($ligne['Titre'])?></h3>
                        </div>
                    </div>
                </a>
                <?php } ?>
        </div>
    </body>
    <script src="../js/test.js"></script>
</html>