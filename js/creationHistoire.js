function afficherParagraphe() {
    const nbParagraphes = document.getElementById("nbParagraphes").value;
    const holder = document.getElementById("paragraphesContainer");

    for (let i = 0; i < nbParagraphes; i++) {
        const divFormGroup = document.createElement("div");
        divFormGroup.className = "form-group";

        const divCol = document.createElement("div");
        divCol.className = "col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4";
        divFormGroup.appendChild(divCol);
        
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

        if (i != 0) {
            const txt = document.createElement("p");
            txt.textContent = "Entrez la réponse qui ménera à ce paragraphe";
            divCol.appendChild(txt);

            const rep = document.createElement("input");
            rep.type = "text";
            rep.placeholder = "Réponse";
            rep.name = "reponse";
            divCol.appendChild(rep);
        } 

        holder.appendChild(divFormGroup);
    }

    
}


    