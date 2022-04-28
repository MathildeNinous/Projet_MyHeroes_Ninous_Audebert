<?php 
    require_once '../includes/head.php';?>
<!doctype html>
<body>
        <div class="container">
            <div class = "row">
                <?php 
                    $maRequete = "SELECT * FROM histoire";
                    $response = $bdd->query($maRequete);
                    while($ligne = $response->fetch()){
                ?>
            <a href="../src/histoire.php?id=<?=$ligne['Id']?>">    
                <div class="infoClick card col-sm-4">
                    <div class="card-body">
                        <h3 class="card-title text-center" ><?php echo($ligne['Titre'])?></h3>
                    </div>
                </div>
            </a>
                <?php } ?>
            </div>
        </div>
        <?php include '../includes/footer.php'?>
        <script src="../lib/jquery/jquery.min.js"></script>
        <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>