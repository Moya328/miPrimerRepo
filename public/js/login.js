document.addEventListener("DOMContentLoaded", () => {
    const dniInput = document.getElementById("dni");
    const passwordInput = document.getElementById("password");
    const form = document.querySelector("form");

    const params = new URLSearchParams(window.location.search);
    const focusField = params.get("focus") || "dni";

    if (focusField === "password") {
        passwordInput.focus();
    } else {
        dniInput.focus();
    }

    form.addEventListener("submit", (event) => {
        let valid = true;

        dniInput.classList.remove("is-invalid");
        passwordInput.classList.remove("is-invalid");

        const dniPattern = /^[0-9]{7,8}$/;
        if (!dniPattern.test(dniInput.value.replace(/\./g, ""))) {
            dniInput.classList.add("is-invalid");
            valid = false;
        }

        if (passwordInput.value.length < 6) {
            passwordInput.classList.add("is-invalid");
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }
    });
});
