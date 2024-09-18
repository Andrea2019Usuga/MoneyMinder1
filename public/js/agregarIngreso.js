document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('ingreso-form');
  
    // Validación del formulario antes de enviar
    form.addEventListener('submit', function(event) {
      // Ejemplo de validación adicional: asegurarse de que el monto sea positivo
      const monto = parseFloat(document.getElementById('monto').value);
      if (isNaN(monto) || monto <= 0) {
        event.preventDefault();
        alert('Por favor, ingrese un monto válido.');
      }
  
      // Validar la fecha
      const dia = parseInt(document.getElementById('dia').value, 10);
      const mes = parseInt(document.getElementById('mes').value, 10);
      const año = parseInt(document.getElementById('año').value, 10);
  
      if (!checkDate(mes, dia, año)) {
        event.preventDefault();
        alert('Por favor, ingrese una fecha válida.');
      }
    });
  
    // Función para verificar si la fecha es válida
    function checkDate(mes, dia, año) {
      const date = new Date(año, mes - 1, dia);
      return date && (date.getMonth() + 1) === mes && date.getDate() === dia && date.getFullYear() === año;
    }
  });
  
