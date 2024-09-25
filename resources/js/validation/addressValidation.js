// Verifica creazione ristorante

// Prendo il form
const crea_ristorante = document.getElementById("form-crea-ristorante");

// Prendo il bottone submit del form
const bottone = document.getElementById("crea-ristorante");

// Prendo il div del messaggio di errore
const errore_indirizzo = document.getElementById("errore-indirizzo");
const errore_indirizzo1 = document.getElementById("errore-indirizzo!");

// Array degli indirizzi viene passato da Blade
let indirizzi = window.restaurantAddresses;

const error_business_name = document.getElementById("error-business_name");

// Prendo le checkbox delle tipologie
const checkboxes = document.querySelectorAll('input[name="types[]"]');
const erroreTipologie = document.getElementById("errore-tipologie"); // Assicurati che esista un div per mostrare l'errore delle checkbox

// Funzione all'evento del click
bottone.addEventListener("click", function (event) {
    event.preventDefault();

    // Ottengo l'indirizzo inserito nel campo di input
    const indirizzo = document.getElementById("address");

    // Debug: Visualizza gli indirizzi esistenti
    console.log(indirizzi);

    const business_name = document.getElementById("business_name").value;
    const business_name_color = document.getElementById("business_name");

    let isCheckboxChecked = false;

    // Controlla se almeno una checkbox è selezionata
    checkboxes.forEach(function (checkbox) {
        if (checkbox.checked) {
            isCheckboxChecked = true;
        }
    });

    if (!business_name) {
        // Valida il nome del ristorante
        business_name_color.classList.add("border-danger");
        error_business_name.classList.remove("d-none");
        error_business_name.classList.add("d-block");
    } else if (!indirizzo.value) {
        indirizzo.classList.add("border-danger");
        errore_indirizzo1.classList.remove("d-none");
        errore_indirizzo1.classList.add("d-block");
    } else if (indirizzi.includes(indirizzo.value)) {
        // Mostra messaggio di errore se l'indirizzo è già usato
        errore_indirizzo.classList.remove("d-none");
        errore_indirizzo.classList.add("d-block");
        indirizzo.classList.add("border-danger");
    } else if (!isCheckboxChecked) {
        // Mostra l'errore se nessuna checkbox è selezionata
        erroreTipologie.classList.remove("d-none");
        erroreTipologie.classList.add("d-block");
    } else {
        // Nessun errore, invia il form
        crea_ristorante.submit();
    }
});
