function afficherHistoire(titre, description,idHistoire) {
    $("#modalHistoire .modal-title").text(titre);
    $("#modalHistoire .modal-body").text(description);
    $("#modalHistoire.submit").attr('href','paragraphe.php?titre='+titre);
    $("#modalHistoire.submit").attr('onclick',"redirection()");
    $("#modalHistoire .idHistoire").attr('onclick',"suppression("+ idHistoire +")");
}

function redirection(){
    window.location.replace($(".submit").attr('href'));
}

function suppression(idHistoire) {
    $("#idHistoireASupprimer").attr('value',idHistoire);
}
