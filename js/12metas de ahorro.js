document.addEventListener('DOMContentLoaded', function () {
    // Manejar el botón de alternar menú
    const toggleButton = document.querySelector('.sidebar-toggle');
    if (toggleButton) {
        toggleButton.addEventListener('click', toggleMenu);
    }


    // Botones de editar perfil y cerrar sesión
    const editProfileButton = document.querySelector('.user-details button[onclick*="17editarperfil.html"]');
    if (editProfileButton) {
        editProfileButton.addEventListener('click', function () {
            window.location.href = '17editarperfil.html';
        });
    }


    const logoutButton = document.querySelector('.user-details button[onclick*="25cerrar sesión.html"]');
    if (logoutButton) {
        logoutButton.addEventListener('click', function () {
            window.location.href = '25cerrar sesión.html';
        });
    }

});


// Función para alternar el menú
function toggleMenu() {
    const sidebar = document.querySelector('.sidebar');
    if (sidebar) {
        sidebar.classList.toggle('active');
    }
}

document.querySelectorAll('.delete-button').forEach(function (button) {
    button.addEventListener('click', function () {
        const row = button.closest('tr');
        const ingresoNombre = row.querySelector('td:first-child').textContent;


        Swal.fire({
            title: '¿Estás seguro?',
            text: `¿Quieres eliminar la meta de ahorro "${ingresoNombre}"?`,
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
                    text: `La meta de ahorro "${ingresoNombre}" ha sido eliminado.`,
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
