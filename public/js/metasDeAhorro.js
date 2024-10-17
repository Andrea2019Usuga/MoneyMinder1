document.addEventListener('DOMContentLoaded', function () {
    // Manejar el botón de alternar menú
    const toggleButton = document.querySelector('.sidebar-toggle');
    if (toggleButton) {
        toggleButton.addEventListener('click', toggleMenu);
    }

    // Manejar botones de editar perfil y cerrar sesión
    const buttons = document.querySelectorAll('.user-details button');
    buttons.forEach(button => {
        if (button.textContent.includes("editar perfil")) {
            button.addEventListener('click', () => {
                window.location.href = '/MoneyMinder/index.php/editarPerfil';
            });
        } else if (button.textContent.includes("cerrar sesión")) {
            button.addEventListener('click', () => {
                window.location.href = '/MoneyMinder/index.php/cerrarSesion';
            });
        }
    });

    // Agregar eventos a los botones de eliminar
    document.querySelectorAll('.delete-button').forEach(function (button) {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            confirmDelete(id);
        });
    });
});

// Función de confirmación de eliminación
function confirmDelete(id) {
    const row = document.querySelector(`tr[data-id="${id}"]`); // Obtener la fila correspondiente

    // Obtener el nombre de la meta (suponiendo que está en la primera celda)
    const metaNombre = row.querySelector('td:first-child').textContent;

    Swal.fire({
        title: '¿Estás seguro?',
        text: `¿Quieres eliminar la meta de ahorro "${metaNombre}"?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#b4a7d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Enviar la solicitud de eliminación
            fetch('/MoneyMinder/index.php/eliminarMetaAhorro', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({ id: id })
            })
            .then(response => {
                if (response.ok) {
                    Swal.fire({
                        title: 'Eliminado!',
                        text: `La meta de ahorro "${metaNombre}" ha sido eliminada.`,
                        icon: 'success',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'swal-button-ok'
                        }
                    });
                    // Eliminar la fila de la tabla
                    row.remove();
                } else {
                    Swal.fire(
                        'Error!',
                        'No se pudo eliminar la meta de ahorro.',
                        'error'
                    );
                }
            })
            .catch(error => {
                console.error('Error en la solicitud:', error);
                Swal.fire(
                    'Error!',
                    'Hubo un problema al intentar eliminar la meta de ahorro.',
                    'error'
                );
            });
        }
    });
}

// Función para alternar el menú
function toggleMenu() {
    const sidebar = document.querySelector('.sidebar');
    if (sidebar) {
        sidebar.classList.toggle('active');
    }
}


// Función para alternar el menú
function toggleMenu() {
    const sidebar = document.querySelector('.sidebar');
    if (sidebar) {
        sidebar.classList.toggle('active');
    }
}
