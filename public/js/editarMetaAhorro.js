document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');

    form.addEventListener('submit', function (event) {
        // Solo evita el envío si la validación falla
        if (!validateForm()) {
            event.preventDefault(); // Previene el envío del formulario solo si la validación falla
        }
    });

    function validateForm() {
        let valid = true;

        // Validar el nombre de la meta de ahorro
        const nombreMeta = document.getElementById('nombre');
        if (nombreMeta.value.trim() === '') {
            valid = false;
            alert('El nombre de la meta de ahorro es requerido.');
        }

        // Validar el monto
        const monto = document.getElementById('monto_ahorrar');
        if (monto.value.trim() === '' || isNaN(monto.value) || parseFloat(monto.value) <= 0) {
            valid = false;
            alert('El monto es requerido y debe ser un número positivo.');
        }

        // Validar el monto actual
        const montoActual = document.getElementById('monto_actual');
        if (montoActual.value.trim() === '' || isNaN(montoActual.value) || parseFloat(montoActual.value) < 0) {
            valid = false;
            alert('El monto actual es requerido y debe ser un número no negativo.');
        }

        // Validar la fecha de inicio
        const fechaInicio = document.getElementById('fecha_inicio');
        if (!fechaInicio.value) {
            valid = false;
            alert('La fecha de inicio es requerida.');
        }

        // Validar la fecha de fin
        const fechaFin = document.getElementById('fecha_fin');
        if (!fechaFin.value) {
            valid = false;
            alert('La fecha de fin es requerida.');
        }

        return valid;
    }
});


