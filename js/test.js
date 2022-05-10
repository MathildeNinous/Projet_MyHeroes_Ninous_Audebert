function afficherHistoire(titre, description) {
    $(".modal-title").text(titre);
    $(".modal-body").text(description);
    $(".submit").attr('href','paragraphe.php?titre='+titre);
    $(".submit").attr('onclick',"redirection()");
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