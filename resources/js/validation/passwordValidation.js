// Verifica identicità password alla registrazione
const sub_verify = document.getElementById("sub_verify");

const error_message = document.getElementById("error_message");

const error_message_p_iva = document.getElementById("error-message-p-iva");

const error_message_password = document.getElementById(
    "error-message-password"
);

const error_name = document.getElementById("error-name");
const error_surname = document.getElementById("error-surname");
const error_email = document.getElementById("error-email");

function emailIsValid(email) {
    var regex_email_valida =
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regex_email_valida.test(email);
}

const form = document.getElementById("myForm");

sub_verify.addEventListener("click", function (event) {
    event.preventDefault();

    const p_iva = document.getElementById("p_iva");

    const val1 = document.getElementById("password").value;
    const val1_color = document.getElementById("password");

    const val2 = document.getElementById("password-confirm").value;
    const val2_color = document.getElementById("password-confirm");

    const name = document.getElementById("name").value;
    const name_color = document.getElementById("name");

    const surname = document.getElementById("surname").value;
    const surname_color = document.getElementById("surname");

    const email = document.getElementById("email").value;
    const email_color = document.getElementById("email");

    if (!name) {
        name_color.classList.add("border-danger");
        error_name.classList.remove("d-none");
        error_name.classList.add("d-block");
    } else if (!surname) {
        surname_color.classList.add("border-danger");
        error_surname.classList.remove("d-none");
        error_surname.classList.add("d-block");
    } else if (!email || !emailIsValid(email)) {
        email_color.classList.add("border-danger");
        error_email.classList.remove("d-none");
        error_email.classList.add("d-block");
    } else if (p_iva.value.length !== 11) {
        error_message_p_iva.classList.remove("d-none");
        error_message_p_iva.classList.add("d-block");
        p_iva.classList.add("border-danger");
    } else if (val1 !== val2) {
        error_message.classList.remove("d-none");
        error_message.classList.add("d-block");
        val1_color.classList.add("border-danger");
        val2_color.classList.add("border-danger");
    } else if (!val1 || val1.length < 8) {
        error_message_password.classList.remove("d-none");
        error_message_password.classList.add("d-block");
        val1_color.classList.add("border-danger");
    } else {
        form.submit();
    }
});
