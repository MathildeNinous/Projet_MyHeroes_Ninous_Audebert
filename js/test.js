function afficherHistoire(titre, description, idHistoire) {
    $("#modalHistoire .modal-title").text(titre);
    $("#modalHistoire .modal-body").text(description);
    $("#modalHistoire .monHistoire").attr('href','../src/paragraphe.php?titre='+titre);
    $("#modalHistoire .monHistoire").attr('onclick',"redirection()");
    $("#modalHistoire .idHistoire").attr('onclick',"suppression("+ idHistoire +")");
    $("#modalHistoire .idHistoireCacher").attr('onclick',"suppression("+ idHistoire +")");
}

function redirection(){
    window.location.replace($(".monHistoire").attr('href'));
}

function RecapHistoire(id){
    $(".recap"+id ).toggle();
}

function statistique(id){
    $(".statistique"+id).toggle();
}

function MesHistoires(id){
    console.log(id);
    $(".histoire"+id ).toggle();
}

$(".afficheHistoire").hide();
$(".recap").hide();
$(".statistique").hide();


function suppression(idHistoire) {
    $("#idHistoireASupprimer").attr('value',idHistoire);
    $("#idHistoireACacher").attr('value',idHistoire);
    $('#idHistoireARendreVisible').attr('value',idHistoire);
}
