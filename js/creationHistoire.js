function afficherParagraphe() {
    const nbParagraphes = document.getElementById("nbParagraphes").value;
    if(nbParagraphes < 3 ){
        alert("Vous devez entrez au moins 3 paragraphes");
    }else{
        $('#validNbParagraphes').hide();
    const holder = document.getElementById("paragraphesContainer");

    for (let i = 0; i < nbParagraphes; i++) {
        const divFormGroup = document.createElement("div");
        divFormGroup.className = "form-group";

        const divCol = document.createElement("div");
        divCol.className = "w-100";
        divFormGroup.appendChild(divCol);
        
          
        //Affichage paragraphe
        const titre = document.createElement("h4");
        titre.textContent = "Paragraphe " + (i+1);
        titre.style.fontWeight="bold";
        titre.style.marginTop = "1em";
        divCol.appendChild(titre);
        
        //Affichage zone texte réponse pour tous les paragraphes sauf le premier
        if (i != 0) {
            const txt = document.createElement("p");
            txt.textContent = "Entrez la réponse qui mènera à ce paragraphe";
            divCol.appendChild(txt);

            const rep = document.createElement("input");
            rep.className= "form-control";
            rep.type = "text";
            rep.placeholder = "Réponse";
            rep.name = "reponse[]";
            divCol.appendChild(rep);
        } 
      

        const area = document.createElement("textarea");
        area.className = "form-control";
        area.name = "paragraphe[]";
        area.rows = "10";
        area.placeholder = "Veuillez écrire le contenu du paragraphe que vous souhaitez créer"
        divCol.appendChild(area);


        //affichage choix capacité
        const txtCapacite = document.createElement("p");
        txtCapacite.textContent = "Entrez un chiffre entre 1 et 4 pour choisir une capacité";
        divCol.appendChild(txtCapacite);

        const listCapacite = document.createElement("select");
        listCapacite.className = "capacite form-control";
        listCapacite.name = "capacite[]";
        divCol.appendChild(listCapacite);
        const capacite1 = document.createElement("option");
        capacite1.textContent="Puisssance";
        capacite1.value='1';
        listCapacite.appendChild(capacite1);
        const capacite2 = document.createElement("option");
        capacite2.textContent="Souplesse";
        capacite2.value='2';
        listCapacite.appendChild(capacite2);
        const capacite3 = document.createElement("option");
        capacite3.textContent="Fatigue";
        capacite3.value='3';
        listCapacite.appendChild(capacite3);
        const capacite4 = document.createElement("option");
        capacite4.textContent="Deshydratation";
        capacite4.value='4';
        listCapacite.appendChild(capacite4);

        holder.appendChild(divFormGroup);
    }

}
}


    