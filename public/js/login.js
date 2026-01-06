document.addEventListener("DOMContentLoaded", () => {
    const dniInput = document.getElementById("dni");
    const passwordInput = document.getElementById("password");
    const form = document.querySelector("form");

    // 1. Detectar si hay error en la URL
    const params = new URLSearchParams(window.location.search);
    const error = params.get("error");

    if (error === "password") {
        // Si la contraseña fue incorrecta → focus en password
        passwordInput.focus();
    } else {
        // En cualquier otro caso → focus en DNI
        dniInput.focus();
    }

    // 2. Validación al enviar
    form.addEventListener("submit", (event) => {
        let valid = true;

        // Resetear clases
        dniInput.classList.remove("is-invalid");
        passwordInput.classList.remove("is-invalid");

        // Validar DNI
        const dniPattern = /^[0-9]{7,8}$/;
        if (!dniPattern.test(dniInput.value.replace(/\./g, ""))) {
            dniInput.classList.add("is-invalid");
            valid = false;
        }

        // Validar contraseña
        if (passwordInput.value.length < 6) {
            passwordInput.classList.add("is-invalid");
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }
    });
});
