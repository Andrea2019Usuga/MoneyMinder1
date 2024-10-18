document.addEventListener("DOMContentLoaded", function() {
    var registrationForm = document.getElementById("registration-form");

    registrationForm.addEventListener("submit", function(event) {
        event.preventDefault(); // Previene el envío del formulario por defecto

        var nombre = document.getElementById("nombre").value;
        var apellido = document.getElementById("apellido").value;
        var fechaNacimiento = new Date(document.getElementById("fecha-nacimiento").value);
        var correo = document.getElementById("correo").value;
        var contrasena = document.getElementById("contrasena").value;

        // Validar todos los campos
        if (validate(nombre, apellido, fechaNacimiento, correo, contrasena)) {
            // Si todas las validaciones pasan, se puede redirigir al menú principal
            showMessage("Registro exitoso. Redireccionando al menú principal.", "alert-success");
            setTimeout(function() {
                window.location.href = "6menu principal ingresos.html"; // Redirigir después de 2 segundos
            }, 2000);
        }
    });

    function validate(nombre, apellido, fechaNacimiento, correo, contrasena) {
        var isValid = true;

        // Ocultar todos los tooltips
        hideAllTooltips();

        // Verificar que todos los campos estén completos
        if (nombre === "") {
            showTooltip("tooltip-nombre", "Por favor complete este campo.");
            isValid = false;
        }
        if (apellido === "") {
            showTooltip("tooltip-apellido", "Por favor complete este campo.");
            isValid = false;
        }
        if (fechaNacimiento.toString() === "Invalid Date") {
            showTooltip("tooltip-fecha-nacimiento", "Por favor complete este campo.");
            isValid = false;
        }
        if (correo === "") {
            showTooltip("tooltip-correo", "Por favor complete este campo.");
            isValid = false;
        }
        if (contrasena === "") {
            showTooltip("tooltip-contrasena", "Por favor complete este campo.");
            isValid = false;
        }

        // Verificar que la contraseña tenga al menos 8 caracteres
        if (contrasena.length < 8) {
            showTooltip("tooltip-contrasena", "La contraseña debe tener al menos 8 caracteres.");
            isValid = false;
        }

        // Verificar el formato del correo electrónico
        if (!validateEmail(correo)) {
            showTooltip("tooltip-correo", "El correo electrónico debe tener un formato válido.");
            isValid = false;
        }

        // Verificar que el correo no tenga espacios en blanco
        if (correo.includes(" ")) {
            showTooltip("tooltip-correo", "El correo electrónico no puede contener espacios en blanco.");
            isValid = false;
        }

        // Validar edad (mayor de 18 años)
        if (!esMayorDeEdad(fechaNacimiento)) {
            showTooltip("tooltip-fecha-nacimiento", "Debes ser mayor de 18 años para registrarte.");
            isValid = false;
        }

        return isValid;
    }

    function showTooltip(elementId, message) {
        var tooltip = document.getElementById(elementId);
        tooltip.innerText = message;
        tooltip.style.display = "block";
    }

    function hideAllTooltips() {
        var tooltips = document.querySelectorAll(".tooltip");
        tooltips.forEach(function(tooltip) {
            tooltip.style.display = "none";
        });
    }

    function showMessage(message, type) {
        var alertElement = document.createElement("div");
        alertElement.classList.add(type);
        alertElement.innerText = message;
        document.body.appendChild(alertElement);
        setTimeout(function() {
            alertElement.remove();
        }, 3000);
    }

    function validateEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

    function esMayorDeEdad(fechaNacimiento) {
        var edadMinima = 18;
        var fechaActual = new Date();
        var edad = fechaActual.getFullYear() - fechaNacimiento.getFullYear();

        if (fechaActual.getMonth() < fechaNacimiento.getMonth() || (fechaActual.getMonth() === fechaNacimiento.getMonth() && fechaActual.getDate() < fechaNacimiento.getDate())) {
            edad--;
        }

        return edad >= edadMinima;
    }
});
