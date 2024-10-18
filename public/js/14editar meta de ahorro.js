document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const nombreMeta = document.getElementById('nombre-meta');
    const monto = document.getElementById('monto');
    const montoActual = document.getElementById('monto-actual');
    const diaInicio = document.getElementById('dia-inicio');
    const mesInicio = document.getElementById('mes-inicio');
    const añoInicio = document.getElementById('año-inicio');
    const diaFin = document.getElementById('dia-fin');
    const mesFin = document.getElementById('mes-fin');
    const añoFin = document.getElementById('año-fin');
    const submitButton = document.querySelector('.submit-button');


    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Evita el envío del formulario para validarlo primero


        if (validateForm()) {
            // Aquí podrías añadir la lógica para guardar los datos en un servidor
            // Por ahora, redirigiremos a la página principal de metas de ahorro
            window.location.href = '12metas de ahorro.html';
        }
    });


    function validateForm() {
        let valid = true;


        // Validar el nombre de la meta de ahorro
        if (nombreMeta.value.trim() === '') {
            valid = false;
            alert('El nombre de la meta de ahorro es requerido.');
        }


        // Validar el monto
        if (monto.value.trim() === '' || isNaN(monto.value) || parseFloat(monto.value) <= 0) {
            valid = false;
            alert('El monto es requerido y debe ser un número positivo.');
        }


        // Validar el monto actual
        if (montoActual.value.trim() === '' || isNaN(montoActual.value) || parseFloat(montoActual.value) <= 0) {
            valid = false;
            alert('El monto actual es requerido y debe ser un número positivo.');
        }


        // Validar la fecha de inicio
        if (!validateDate(diaInicio.value, mesInicio.value, añoInicio.value)) {
            valid = false;
            alert('La fecha de inicio ingresada no es válida.');
        }


        // Validar la fecha de fin
        if (!validateDate(diaFin.value, mesFin.value, añoFin.value)) {
            valid = false;
            alert('La fecha de fin ingresada no es válida.');
        }


        return valid;
    }


    function validateDate(day, month, year) {
        const date = new Date(year, month - 1, day);
        return date && date.getFullYear() == year && date.getMonth() == month - 1 && date.getDate() == day;
    }
});


