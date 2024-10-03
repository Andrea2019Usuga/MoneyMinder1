document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(event) {
        const nombreMeta = document.getElementById('nombre-meta').value.trim();
        const montoAhorrar = document.getElementById('monto-ahorrar').value;
        const montoActual = document.getElementById('monto-actual').value;
        
        const diaInicio = document.getElementById('dia-inicio').value;
        const mesInicio = document.getElementById('mes-inicio').value;
        const añoInicio = document.getElementById('año-inicio').value;
        
        const diaFin = document.getElementById('dia-fin').value;
        const mesFin = document.getElementById('mes-fin').value;
        const añoFin = document.getElementById('año-fin').value;

        // Validación de campos obligatorios
        if (!nombreMeta || !montoAhorrar || !montoActual || !diaInicio || !mesInicio || !añoInicio || !diaFin || !mesFin || !añoFin) {
            alert('Por favor, complete todos los campos.');
            event.preventDefault();
            return;
        }

        // Validación de montos
        if (isNaN(montoAhorrar) || isNaN(montoActual)) {
            alert('Los montos deben ser números válidos.');
            event.preventDefault();
            return;
        }

        // Validación de fechas
        const fechaInicio = new Date(añoInicio, mesInicio - 1, diaInicio);
        const fechaFin = new Date(añoFin, mesFin - 1, diaFin);
        
        if (fechaInicio >= fechaFin) {
            alert('La fecha de inicio debe ser anterior a la fecha de fin.');
            event.preventDefault();
            return;
        }

        // Validación adicional de rango de fechas
        const hoy = new Date();
        if (fechaInicio < hoy) {
            alert('La fecha de inicio debe ser una fecha futura.');
            event.preventDefault();
            return;
        }
    });
});
