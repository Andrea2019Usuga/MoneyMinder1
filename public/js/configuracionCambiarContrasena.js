function toggleDropdown() {
    const dropdownContent = document.querySelector('.dropdown-content');
    const arrow = document.getElementById('arrow');
    const configButton = document.getElementById('config-button'); // Obtener el botón de configuración

    // Alternar la clase 'show' en el dropdown
    dropdownContent.classList.toggle('show');

    // Cambiar el ícono de la flecha según el estado
    if (dropdownContent.classList.contains('show')) {
        arrow.classList.remove('fa-chevron-down'); // Cambia a flecha hacia arriba
        arrow.classList.add('fa-chevron-up');
        dropdownContent.setAttribute('aria-hidden', 'false'); // Asegurarse de que sea accesible
        configButton.classList.add('active'); // Añadir clase para mover el botón
    } else {
        arrow.classList.remove('fa-chevron-up'); // Cambia a flecha hacia abajo
        arrow.classList.add('fa-chevron-down');
        dropdownContent.setAttribute('aria-hidden', 'true'); // Asegurarse de que sea accesible
        configButton.classList.remove('active'); // Eliminar clase para volver a la posición original
    }
}
