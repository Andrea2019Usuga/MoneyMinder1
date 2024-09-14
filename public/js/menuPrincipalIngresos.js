document.addEventListener('DOMContentLoaded', function () {
    // Resto del código JavaScript


    function toggleMenu() {
        const sidebar = document.querySelector('.sidebar');
        sidebar.classList.toggle('active');
    }


    // Botones de editar perfil y cerrar sesión
    document.querySelector('.user-details button[onclick*="16Editar perfil.html"]').addEventListener('click', function () {
        window.location.href = '16Editar perfil.html';
    });


    document.querySelectorAll('.delete-button').forEach(function (button) {
        button.addEventListener('click', function () {
            const row = button.closest('tr');
            const ingresoNombre = row.querySelector('td:first-child').textContent;


            Swal.fire({
                title: '¿Estás seguro?',
                text: `¿Quieres eliminar el ingreso "${ingresoNombre}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#b4a7d6',
                cancelButtonColor: '#b4a7d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    row.remove();
                    Swal.fire({
                        title: 'Eliminado!',
                        text: `El ingreso "${ingresoNombre}" ha sido eliminado.`,
                        icon: 'success',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'swal-button-ok'
                        }
                    });
                }
            });
        });
    });
});


