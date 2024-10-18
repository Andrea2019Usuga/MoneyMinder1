document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const nombreIngreso = document.getElementById('nombre-ingreso');
    const monto = document.getElementById('monto');
    const dia = document.getElementById('dia');
    const mes = document.getElementById('mes');
    const año = document.getElementById('año');
    const submitButton = document.querySelector('.submit-button');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Evita el envío del formulario para validarlo primero

        if (validateForm()) {
            // Aquí podrías añadir la lógica para guardar los datos en un servidor
            // Por ahora, redirigiremos a la página principal de ingresos
            window.location.href = '6menu principal ingresos.html';
        }
    });

    function validateForm() {
        let valid = true;

        // Validar el nombre del ingreso
        if (nombreIngreso.value.trim() === '') {
            valid = false;
            alert('El nombre del ingreso es requerido.');
        }

        // Validar el monto
        if (monto.value.trim() === '' || isNaN(monto.value) || parseFloat(monto.value) <= 0) {
            valid = false;
            alert('El monto es requerido y debe ser un número positivo.');
        }

        // Validar la fecha
        if (!validateDate(dia.value, mes.value, año.value)) {
            valid = false;
            alert('La fecha ingresada no es válida.');
        }

        return valid;
    }

    function validateDate(day, month, year) {
        const date = new Date(year, month - 1, day);
        return date && date.getFullYear() == year && date.getMonth() == month - 1 && date.getDate() == day;
    }
});
