// JavaScript para manejar la interactividad de los botones

function toggleMenu() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('active');
}

document.addEventListener('DOMContentLoaded', function () {
    // Resto del código JavaScript
});

document.addEventListener('DOMContentLoaded', function () {
    // Botones de editar perfil y cerrar sesión
    document.querySelector('.user-details submit[onclick*="17editarperfil.html"]').addEventListener('click', function () {
        window.location.href = '11editar gasto.html';
    });
});

document.querySelectorAll('.delete-button').forEach(function (button) {
    button.addEventListener('click', function () {
        const row = button.closest('tr');
        const ingresoNombre = row.querySelector('td:first-child').textContent;


        Swal.fire({
            title: '¿Estás seguro?',
            text: `¿Quieres eliminar el gasto "${ingresoNombre}"?`,
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
                    text: `El gasto "${ingresoNombre}" ha sido eliminado.`,
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



