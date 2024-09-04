document.addEventListener("DOMContentLoaded", function () {
    // Obtener referencias a los elementos del DOM
    const form = document.getElementById("loginForm");
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const errorMessage = document.createElement("div");  // Crear un div para mensajes de error
    errorMessage.setAttribute("id", "error-message");
    errorMessage.style.display = "none";  // Ocultarlo por defecto
    form.appendChild(errorMessage);  // Añadirlo al formulario
 
    // Escuchar el evento submit del formulario
    form.addEventListener("submit", function (event) {
        // Prevenir el envío del formulario
        event.preventDefault();
 
        // Obtener valores de los campos
        const emailValue = email.value.trim();
        const passwordValue = password.value.trim();
 
        // Validar campos
        if (emailValue === "" || passwordValue === "") {
            showError("Por favor, diligencie todos los campos.");
        } else if (!validateEmail(emailValue)) {
            showError("Correo electrónico no válido.");
        } else if (!validatePassword(passwordValue)) {
            showError("La contraseña debe tener al menos 8 caracteres.");
        } else {
            // Redirigir al usuario a la página principal si los datos son correctos
            window.location.href = "/MoneyMinder/index.php/menuPrincipalIngresos";
        }
    });
 
    // Función para validar el correo electrónico
    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
 
    // Función para validar la contraseña
    function validatePassword(password) {
        return password.length >= 8;
    }
 
    // Función para mostrar mensajes de error
    function showError(message) {
        errorMessage.textContent = message;
        errorMessage.style.display = "block";
        errorMessage.style.color = "red";  // Añadir estilo al mensaje de error
    }
});
