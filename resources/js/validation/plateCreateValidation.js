// Prendo il form
const crea_piatto = document.getElementById("form-crea-piatto");

// Prendo il bottone submit del form
const bottone = document.getElementById("crea-piatto");

//prendo il campo input egli ingredienti
const ingredients = document.getElementById("ingredients");

// Prendo il div del messaggio di errore
const errore_ingredienti = document.getElementById("errore-ingredienti");

// Funzione all'evento del click
bottone.addEventListener("click", function (event) {
    event.preventDefault();

    if (!ingredients.value) {
        errore_ingredienti.classList.remove("d-none");
        errore_ingredienti.classList.add("d-block");
        ingredients.classList.add("border-danger");
    } else {
        // Nessun errore, invia il form
        crea_piatto.submit();
    }
});
