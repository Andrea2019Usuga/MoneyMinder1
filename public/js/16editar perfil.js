document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registration-form');
    const nombreInput = document.getElementById('nombre');
    const apellidoInput = document.getElementById('apellido');
    const fechaNacimientoInput = document.getElementById('fecha-nacimiento');
    const correoInput = document.getElementById('correo');
    const contrasenaInput = document.getElementById('contrasena');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Evita que el formulario se envíe por defecto

        // Realizar validaciones de los campos aquí
        if (validarNombre() && validarApellido() && validarFechaNacimiento() && validarCorreo()) {
            // Si todos los campos son válidos, redireccionar a la página de notificación editar perfil
            window.location.href = "17notificación editar perfil.html"; // Cambiar a la página deseada
        }
    });

    function validarNombre() {
        const valor = nombreInput.value.trim();
        if (valor === '') {
            mostrarTooltip(nombreInput, 'El nombre es requerido.');
            return false;
        }
        return true;
    }

    function validarApellido() {
        const valor = apellidoInput.value.trim();
        if (valor === '') {
            mostrarTooltip(apellidoInput, 'El apellido es requerido.');
            return false;
        }
        return true;
    }

    function validarFechaNacimiento() {
        const valor = fechaNacimientoInput.value.trim();
        if (valor === '') {
            mostrarTooltip(fechaNacimientoInput, 'La fecha de nacimiento es requerida.');
            return false;
        }
        // Puedes agregar más validaciones específicas para la fecha de nacimiento si es necesario
        return true;
    }

    function validarCorreo() {
        const valor = correoInput.value.trim();
        if (valor === '') {
            mostrarTooltip(correoInput, 'El correo electrónico es requerido.');
            return false;
        }
        // Puedes agregar una validación más específica para el formato del correo electrónico si es necesario
        return true;
    }


    function mostrarTooltip(input, mensaje) {
        const tooltip = input.nextElementSibling; // Selecciona el elemento siguiente al input (tooltip)
        tooltip.textContent = mensaje; // Establece el mensaje de error
        tooltip.style.display = 'block'; // Muestra el tooltip
        setTimeout(function() {
            tooltip.style.display = 'none'; // Oculta el tooltip después de unos segundos
        }, 3000); // Tiempo en milisegundos (en este caso, 3 segundos)
    }
});
