function afficherHistoire(titre, description) {
    $("#modalHistoire .modal-title").text(titre);
    $("#modalHistoire .modal-body").text(description);
    $("#modalHistoire.submit").attr('href','paragraphe.php?titre='+titre);
    $("#modalHistoire.submit").attr('onclick',"redirection()");
}

function redirection(){
    window.location.replace($(".submit").attr('href'));
}

