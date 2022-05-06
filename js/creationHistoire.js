function afficherParagraphe() {
    const nbParagraphes = document.getElementById("nbParagraphes").value;
    const holder = document.getElementById("paragraphesContainer");

    for (let i = 0; i < nbParagraphes; i++) {
        console.log(i);
        const divFormGroup = document.createElement("div");
        divFormGroup.className = "form-group";

        const divCol = document.createElement("div");
        divCol.className = "col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4";
        divFormGroup.appendChild(divCol);
        
        const area = document.createElement("textarea");
        area.className = "form-control";
        area.id = "description";
        area.rows = "10";
        divCol.appendChild(area);

        holder.appendChild(divFormGroup);
    }

    
}


    