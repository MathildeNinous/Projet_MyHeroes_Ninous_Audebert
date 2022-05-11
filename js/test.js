function afficherHistoire(titre, description,idHistoire) {
    $("#modalHistoire .modal-title").text(titre);
    $("#modalHistoire .modal-body").text(description);
    $("#modalHistoire.submit").attr('href','paragraphe.php?titre='+titre);
    $("#modalHistoire.submit").attr('onclick',"redirection()");
    $("#modalHistoire .idHistoire").attr('onclick',"suppression("+ idHistoire +")");
    $("#modalHistoire .idHistoireCacher").attr('onclick',"suppression("+ idHistoire +")");
}

function redirection(){
    window.location.replace($(".submit").attr('href'));
}

function RecapHistoire(id){
    $(".recap"+id ).toggle();
}

function MesHistoires(id){
    console.log(id);
    $(".histoire"+id ).toggle();
}

$(".afficheHistoire").hide();
$(".recap").hide();
function suppression(idHistoire) {
    $("#idHistoireASupprimer").attr('value',idHistoire);
    $("#idHistoireACacher").attr('value',idHistoire);
}
