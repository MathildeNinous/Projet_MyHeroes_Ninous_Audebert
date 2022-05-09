function afficherParagraphe() {
    const nbParagraphes = document.getElementById("nbParagraphes").value;
    const holder = document.getElementById("paragraphesContainer");

    for (let i = 0; i < nbParagraphes; i++) {
        const divFormGroup = document.createElement("div");
        divFormGroup.className = "form-group";

        const divCol = document.createElement("div");
        divCol.className = "col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4";
        divFormGroup.appendChild(divCol);
        
        //Affichage paragraphe
        const titre = document.createElement("h4");
        titre.textContent = "Paragraphe " + (i+1);
        titre.style.color = "#8157E2";
        divCol.appendChild(titre);

        const area = document.createElement("textarea");
        area.className = "form-control";
        area.name = "paragraphe[]";
        area.rows = "10";
        area.placeholder = "Veuillez écrire le contenu du paragraphe que vous souhaitez créer"
        divCol.appendChild(area);

        //Affichage zone texte réponse pour tous les paragraphes sauf le premier
        if (i != 0) {
            const txt = document.createElement("p");
            txt.textContent = "Entrez la réponse qui ménera à ce paragraphe";
            divCol.appendChild(txt);

            const rep = document.createElement("input");
            rep.className= "form-control";
            rep.type = "text";
            rep.placeholder = "Réponse";
            rep.name = "reponse[]";
            divCol.appendChild(rep);
        } 

        //affichage choix capacité
        const txtCapacite = document.createElement("p");
        txtCapacite.textContent = "Entrez un chiffre entre 1 et 4 pour choisir une capacité";
        divCol.appendChild(txtCapacite);

        const capacite = document.createElement("input");
        capacite.className= "form-control";
        capacite.type = "text";
        capacite.placeholder = "1,2,3 ou 4";
        capacite.name = "capacite[]";
        divCol.appendChild(capacite);


        holder.appendChild(divFormGroup);
    }

    
}


    