// Función para mostrar/ocultar el menú desplegable
function toggleDropdown() {
    var dropdown = document.querySelector('.dropdown');
    dropdown.classList.toggle('show');
}
// Función para mostrar la alerta de confirmación de eliminación de cuenta
function confirmDelete(form) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Esta acción no se puede deshacer.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#b4a7d6',
        cancelButtonColor: '#b4a7d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            // Enviar el formulario para eliminar la cuenta
            form.submit();
        }
    });
}

document.addEventListener('DOMContentLoaded', function () {
    // Agregar el evento click al botón "Sí" de eliminación
    const yesButton = document.querySelector('.btn.yes');

    // Solo agregar el evento si el botón existe
    if (yesButton) {
        yesButton.addEventListener('click', function (event) {
            event.preventDefault(); // Evitar que el formulario se envíe inmediatamente
            const form = this.closest('form'); // Obtener el formulario relacionado
            confirmDelete(form); // Llamar a la función de confirmación
        });
    }
});