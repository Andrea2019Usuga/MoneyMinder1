document.addEventListener('DOMContentLoaded', function () {
    function confirmDelete(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta acción no se puede deshacer.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Enviar la solicitud de eliminación
                fetch('/MoneyMinder/index.php/eliminarIngreso', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({ id: id })
                })
                .then(response => {
                    if (response.ok) {
                        Swal.fire(
                            'Eliminado!',
                            'El ingreso ha sido eliminado.',
                            'success'
                        );
                        // Eliminar la fila de la tabla
                        const row = document.querySelector(`tr[data-id="${id}"]`);
                        if (row) {
                            row.remove();
                        } else {
                            console.error(`No se encontró la fila con el ID ${id} para eliminar.`);
                        }
                    } else {
                        Swal.fire(
                            'Error!',
                            'No se pudo eliminar el ingreso.',
                            'error'
                        );
                    }
                })
                .catch(error => {
                    console.error('Error en la solicitud:', error);
                    Swal.fire(
                        'Error!',
                        'Hubo un problema al intentar eliminar el ingreso.',
                        'error'
                    );
                });
            }
        });
    }

    // Agregar eventos a los botones de eliminar
    document.querySelectorAll('.delete-button').forEach(function (button) {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            confirmDelete(id);
        });
    });
});
