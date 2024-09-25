// Prendo il form
const crea_piatto = document.getElementById("form-crea-piatto");

// Prendo il bottone submit del form
const bottone = document.getElementById("crea-piatto");

// Prendo il campo input degli ingredienti
const ingredients = document.getElementById("ingredients");

// Prendo il div del messaggio di errore
const errore_ingredienti = document.getElementById("errore-ingredienti");

const error_name = document.getElementById("error-name");
const error_ingredients = document.getElementById("errore-ingredienti");
const error_price = document.getElementById("errore-price"); // Messaggio di errore per il prezzo

// Prendo il campo input del prezzo
const priceInput = document.getElementById("price");

// Aggiungo l'evento 'input' al campo del prezzo per consentire solo numeri
priceInput.addEventListener("input", function (event) {
    // Consenti solo numeri, punto decimale e backspace
    const value = event.target.value;
    const validValue = value.replace(/[^0-9.,]/g, "");

    // Sostituisce il valore non valido con uno valido
    if (value !== validValue) {
        event.target.value = validValue;
    }
});

// Funzione all'evento del click
bottone.addEventListener("click", function (event) {
    event.preventDefault();

    const name = document.getElementById("name").value;
    const name_color = document.getElementById("name");
    const ingredients_value = document.getElementById("ingredients").value;
    const ingredients_color = document.getElementById("ingredients");
    const price_value = priceInput.value;
    const price_color = priceInput;

    let isValid = true;

    if (!name) {
        name_color.classList.add("border-danger");
        error_name.classList.remove("d-none");
        error_name.classList.add("d-block");
        isValid = false;
    } else {
        name_color.classList.remove("border-danger");
        error_name.classList.remove("d-block");
        error_name.classList.add("d-none");
    }

    if (!ingredients_value) {
        ingredients_color.classList.add("border-danger");
        error_ingredients.classList.remove("d-none");
        error_ingredients.classList.add("d-block");
        isValid = false;
    } else {
        ingredients_color.classList.remove("border-danger");
        error_ingredients.classList.remove("d-block");
        error_ingredients.classList.add("d-none");
    }

    if (!price_value || isNaN(price_value) || price_value <= 0) {
        price_color.classList.add("border-danger");
        error_price.classList.remove("d-none");
        error_price.classList.add("d-block");
        isValid = false;
    } else {
        price_color.classList.remove("border-danger");
        error_price.classList.remove("d-block");
        error_price.classList.add("d-none");
    }

    if (isValid) {
        // Nessun errore, invia il form
        crea_piatto.submit();
    }
});
