<?php 
    require_once '../includes/connectBDD.php';

    if(isset($_POST['hide']))
    {
        $idHistoire = $_POST['idHistoireCache'];
        $requeteHide =$bdd->prepare("UPDATE Histoire SET Cacher=? WHERE Id = ?");
        $requeteHide->execute([1,$idHistoire]);
    }

    if(isset($_POST['delete']))
    {
        $idHistoire = $_POST['idHistoire'];
        $requeteSuppr =$bdd->prepare("DELETE FROM Histoire WHERE Id= ?");
        $requeteSuppr->execute([$idHistoire]);
    }

    header('Location:index.php');
?>