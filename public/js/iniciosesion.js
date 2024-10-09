
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
