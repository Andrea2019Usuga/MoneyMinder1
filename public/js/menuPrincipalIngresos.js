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
                fetch(`/MoneyMinder/index.php?action=eliminarIngreso&id=${id}`, { method: 'POST' })
                .then(response => {
                    if (response.ok) {
                        Swal.fire(
                            'Eliminado!',
                            'El ingreso ha sido eliminado.',
                            'success'
                        );
                        // Verificar si el elemento existe antes de intentar eliminarlo
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
            const id = button.getAttribute('data-id');
            confirmDelete(id);
        });
    });

    // Agregar eventos a los botones de editar perfil (si es necesario)
    document.querySelectorAll('.user-details button').forEach(button => {
        button.addEventListener('click', function () {
            const href = this.getAttribute('onclick').match(/window\.location\.href='([^']+)'/)[1];
            window.location.href = href;
        });
    });
});
