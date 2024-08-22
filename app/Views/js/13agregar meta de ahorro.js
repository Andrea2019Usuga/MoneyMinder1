document.getElementById('saving-goal-form').addEventListener('submit', function(event) {
    event.preventDefault();


    // Fetch form values
    const nombreIngreso = document.getElementById('nombre-ingreso').value;
    const montoAhorrar = document.getElementById('monto-ahorrar').value;
    const montoActual = document.getElementById('monto-actual').value;


    const diaInicio = document.getElementById('dia-inicio').value;
    const mesInicio = document.getElementById('mes-inicio').value;
    const añoInicio = document.getElementById('año-inicio').value;


    const diaFin = document.getElementById('dia-fin').value;
    const mesFin = document.getElementById('mes-fin').value;
    const añoFin = document.getElementById('año-fin').value;


    // Validate date
    const fechaInicio = new Date(`${añoInicio}-${mesInicio}-${diaInicio}`);
    const fechaFin = new Date(`${añoFin}-${mesFin}-${diaFin}`);


    if (fechaInicio >= fechaFin) {
        alert('La fecha de inicio debe ser anterior a la fecha de fin.');
        return;
    }


    if (Number(montoAhorrar) <= Number(montoActual)) {
        alert('El monto a ahorrar debe ser mayor que el monto actual.');
        return;
    }


    // Handle form submission logic (e.g., send data to server)
    alert('Meta de ahorro guardada exitosamente.');
   
    // Redirect to another page if needed
    window.location.href = '12metas de ahorro.html';
});


