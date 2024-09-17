// Verifica identicità password alla registrazione
const sub_verify = document.getElementById("sub_verify");

const error_message = document.getElementById("error_message");

const error_message_p_iva = document.getElementById("error-message-p-iva");

const error_message_password = document.getElementById(
    "error-message-password"
);

const form = document.getElementById("myForm");

sub_verify.addEventListener("click", function (event) {
    event.preventDefault();

    const p_iva = document.getElementById("p_iva");

    const val1 = document.getElementById("password").value;

    const val1_color = document.getElementById("password");

    const val2 = document.getElementById("password-confirm").value;

    const val2_color = document.getElementById("password-confirm");

    if (p_iva.value.length !== 11) {
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
