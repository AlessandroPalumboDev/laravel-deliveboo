// Verifica creazione ristorante

// Prendo il form
const crea_ristorante = document.getElementById("form-crea-ristorante");

// Prendo il bottone submit del form
const bottone = document.getElementById("crea-ristorante");

// Prendo il div del messaggio di errore
const errore_indirizzo = document.getElementById("errore-indirizzo");

// Array degli indirizzi viene passato da Blade
let indirizzi = window.restaurantAddresses;

// Funzione all'evento del click
bottone.addEventListener("click", function (event) {
    event.preventDefault();

    // Ottengo l'indirizzo inserito nel campo di input
    const indirizzo = document.getElementById("address");

    // Debug: Visualizza gli indirizzi esistenti
    console.log(indirizzi);

    if (indirizzi.includes(indirizzo.value)) {
        // Mostra messaggio di errore
        errore_indirizzo.classList.remove("d-none");
        errore_indirizzo.classList.add("d-block");
        indirizzo.classList.add("border-danger");
    } else {
        // Nessun errore, invia il form
        crea_ristorante.submit();
    }
});
