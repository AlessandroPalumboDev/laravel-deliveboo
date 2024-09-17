// Verifica identicità password alla registrazione
const sub_verify = document.getElementById("sub_verify");

const error_message = document.getElementById("error_message");

const form = document.getElementById("myForm");

sub_verify.addEventListener("click", function (event) {
    event.preventDefault();

    const val1 = document.getElementById("password").value;

    const val1_color = document.getElementById("password");

    const val2 = document.getElementById("password-confirm").value;

    const val2_color = document.getElementById("password-confirm");

    if (val1 !== val2) {
        error_message.classList.remove("d-none");
        error_message.classList.add("d-block");
        val1_color.classList.add("border-danger");
        val2_color.classList.add("border-danger");
    } else {
        form.submit();
    }
});
